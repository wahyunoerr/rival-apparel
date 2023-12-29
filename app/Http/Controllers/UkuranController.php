<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.ukuran.index');
    }

    function ajaxUkuran()
    {
        $ukuran = Ukuran::all();
        return DataTables::of($ukuran)
            ->addColumn('action', function ($ukuran) {
                return '<span><buttton data-toggle="tooltip" data-placement="top" title="Edit" onclick="editUk(' . $ukuran->id . ')"><i class="fa fa-pencil color-muted m-r-5"></i> </buttton> ' .
                    '<buttton data-toggle="tooltip" data-placement="top" title="Close" onclick="delUk(' . $ukuran->id . ')"><i class="fa fa-close color-danger"></i></buttton></span>';
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
        $request->validate([
            'nUkuran' => 'required|string|min:2',
            'harga' => 'required|numeric|min:2'
        ]);

        Ukuran::create([
            'nUkuran' => $request->nUkuran,
            'harga' => $request->harga
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ukuran $ukuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ukuran $ukuran)
    {
        return response()->json($ukuran);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ukuran $ukuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ukuran $ukuran)
    {
        $ukuran->delete();

        return response()->json($ukuran);
    }
}
