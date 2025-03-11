<?php

namespace App\Http\Controllers\Dashboard\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Stage;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $stages = Stage::select(['id', 'name', 'status']);

            return DataTables::of($stages)
                ->addColumn('status', function ($stage) {
                    return view("dashboard.inc.table.switch", ["row" => $stage])->render();
                })
                ->addColumn('options', function ($stage) {
                    return view("dashboard.inc.table.action", [
                        "row" => $stage,
                        "editUrl" => route('dashboard.stages.edit', $stage->id)
                    ])->render();
                })
                ->rawColumns(['status', 'options'])
                ->make(true);
        }

        return view('dashboard.pages.settings.stages.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.settings.stages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
