<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Product;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        $ukuran = Ukuran::all();
        return view('backend.product.index', compact('kategori', 'ukuran'));
    }

    function productAjax()
    {
        $product = Product::with(['Kategori:name', 'Ukuran:nUkuran'])->latest()->get();

        return DataTables::of($product)
            ->addColumn(
                'kategori_id',
                function ($product) {
                    return $product->kategori->name;
                }
            )
            ->addColumn(
                'ukuran_id',
                function ($product) {
                    return $product->ukuran->nUkuran;
                }
            )
            ->addColumn('action', function ($product) {
                return '<span><buttton data-toggle="tooltip" data-placement="top" title="Edit" onclick="editProd(' . $product->id . ')"><i class="fa fa-pencil color-muted m-r-5"></i> </buttton> ' .
                    '<buttton data-toggle="tooltip" data-placement="top" title="Close" onclick="delProd(' . $product->id . ')"><i class="fa fa-close color-danger"></i></buttton></span>';
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
            'name' => 'required|min:2|string',
            'gambar' => 'required|mimes:png,jpg,jpeg',
            'ukuran' => 'required',
            'kategori' => 'required',
            'harga' => 'required'
        ]);

        Product::create([
            'name' => $request->name,
            'gambar' => $request->gambar->store('photo/produk', 'public'),
            'ukuran_id' => $request->ukuran,
            'kategori_id' => $request->kategori,
            'harga' => $request->harga
        ]);
        return redirect('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
