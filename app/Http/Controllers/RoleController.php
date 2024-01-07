<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.role.index');
    }

    function roleAjax()
    {
        $role = Role::latest();
        return DataTables::of($role)
            ->addColumn('action', function ($role) {
                return '<span><buttton data-toggle="tooltip" data-placement="top" title="Edit" onclick="editKat(' . $role->id . ')"><i class="fa fa-pencil color-muted m-r-5"></i> </buttton> ' .
                    '<buttton data-toggle="tooltip" data-placement="top" title="Close" onclick="delKat(' . $role->id . ')"><i class="fa fa-close color-danger"></i></buttton></span>';
            })->rawColumns(['action'])->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
