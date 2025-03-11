<?php

namespace App\Http\Controllers\Dashboard\Institution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Institution\StoreRequest;
use App\Http\Requests\Dashboard\Institution\UpdateRequest;
use App\Models\Institution;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Stage;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $institutions = Institution::withCount(['stages as stages_count'])->get();

            return DataTables::of($institutions)
                ->addColumn('stages_count', function ($institution) {
                    return $institution->stages_count ?? 0;
                })
                ->addColumn('status', function ($institution) {
                    return view("dashboard.inc.table.switch", ["row" => $institution])->render();
                })
                ->addColumn('options', function ($institution) {
                    return view("dashboard.inc.table.action", [
                        "row" => $institution,
                        "editUrl" => route('dashboard.institutions.edit', $institution->id)
                    ])->render();
                })
                ->rawColumns(['status', 'options'])
                ->make(true);
        }

        return view('dashboard.pages.institutions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $institution = Institution::all();
        $stages = Stage::all();
        return view('dashboard.pages.institutions.create', compact('stages', 'institution'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {

        $institutionData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'website' => $request->website,
        ];

        $institution = Institution::create($institutionData);

        if ($request->has('stages')) {
            $institution->stages()->attach($request->stages);
        }

        return response()->json([
            'success' => true,
            'message' => 'تمت إضافة المعهد الجديد بنجاح.',
            'redirect_url' => route('dashboard.institutions.index')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $institution = Institution::findOrFail($id);
        $stages = Stage::all();
        $selectedStages = $institution->stages->pluck('id')->toArray();

        return view('dashboard.pages.institutions.edit', compact('institution', 'stages', 'selectedStages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {

        $institution = Institution::findOrFail($id);
        
        $updatedData = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,
            'website' => $request->website,
        ];

        $institution->update($updatedData);
        $institution->stages()->sync($request->stages ?? []);

        return response()->json([
            'success' => true,
            'message' => 'تم تحديث بيانات المعهد بنجاح.',
            'redirect_url' => route('dashboard.institutions.index')
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $institution = Institution::find($id);


        $institution->delete();
        return response()->json(['success' => true, 'message' => 'تم حذف بيانات المشرف بنجاح.']);
    }

    public function changeStatus()
    {
        $institution = Institution::findOrFail(request()->id);

        $institution->status = $institution->status === 'active' ? 'inactive' : 'active';
        $institution->save();

        return response()->json(['success' => true, 'status' => $institution->status]);
    }
}
