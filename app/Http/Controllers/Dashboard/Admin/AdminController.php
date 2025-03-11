<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\StoreRequest;
use App\Http\Requests\Dashboard\Admin\UpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $admins = Admin::select(['id', 'name', 'status']);

            return DataTables::of($admins)
                ->addColumn('status', function ($admin) {
                    return view("dashboard.inc.table.switch", ["row" => $admin])->render();
                })
                ->addColumn('options', function ($admin) {
                    return view("dashboard.inc.table.action", [
                        "row" => $admin,
                        "editUrl" => route('dashboard.admins.edit', $admin->id)
                    ])->render();
                })
                ->rawColumns(['status', 'options'])
                ->make(true);
        }

        return view('dashboard.pages.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $adminData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        $admin = Admin::create($adminData);

        return response()->json([
            'success' => true,
            'message' => 'تمت إضافة المشرف الجديد بنجاح.',
            'redirect_url' => route('dashboard.admins.index')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);

        return view('dashboard.pages.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);

        $updatedData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('new_password')) {
            $updatedData['password'] = Hash::make($request->new_password);
        }

        $admin->update($updatedData);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث بيانات المشرف بنجاح.',
            'redirect_url' => route('dashboard.admins.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::find($id);

        if ($admin) {
            $admin->delete();
            return response()->json(['success' => true, 'message' => 'تم حذف بيانات المشرف بنجاح.']);
        }

        return response()->json(['success' => false, 'message' => 'المشرف غير موجود.'], 404);
    }

    public function changeStatus()
    {
        $admin = Admin::findOrFail(request()->id);

        $admin->status = $admin->status === 'active' ? 'inactive' : 'active';
        $admin->save();

        return response()->json(['success' => true, 'status' => $admin->status]);
    }
}
