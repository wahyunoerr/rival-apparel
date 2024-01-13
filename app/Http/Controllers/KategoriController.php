<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.kategori.index');
    }


    function ajaxKategori()
    {
        $kategori = Kategori::latest();
        return DataTables::of($kategori)
            ->addColumn('action', function ($kategori) {
                return '<span><buttton data-toggle="tooltip" data-placement="top" title="Edit" onclick="editKat(' . $kategori->id . ')"><i class="fa fa-pencil color-muted m-r-5"></i> </buttton> ' .
                    '<buttton data-toggle="tooltip" data-placement="top" title="Close" onclick="delKat(' . $kategori->id . ')"><i class="fa fa-close color-danger"></i></buttton></span>';
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
            'name' => 'required|min:2|string'
        ]);

        Kategori::create([
            'name' => $request->name
        ]);

        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return response()->json($kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'name' => 'required|min:2|string'
        ]);
        $kategori->update([
            'name' => $request->name,
        ]);

        return response()->json(['kategori' => $kategori]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json($kategori);
    }
}
