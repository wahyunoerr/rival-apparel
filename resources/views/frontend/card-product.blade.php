@extends('templatef.index')
@section('title', 'List Product')
@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="font-bold text-body mb-3 ">
                <h1>Our Products</h1>
            </div>
            <div class="row">
                @foreach ($product as $p)
                    <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                        <div class="card text-black">
                            <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top" alt="Products" />
                            <div class="card-body">
                                <div class="text-center mt-1">
                                    <h4 class="card-title">{{ $p->kategori->name }}</h4>
                                    <h6 class="text-primary mb-1 pb-3">Rp. {{ $p->harga }},-</h6>
                                </div>

                                <div class="text-center">
                                    <div class="p-3 mx-n3 mb-4 rounded" style="background-color: #eff1f2;">
                                        <h5 class="mb-0">{{ $p->name }}</h5>
                                    </div>
                                </div>

                                <div class="d-flex flex-row">
                                    <a type="button" class="btn btn-outline-primary flex-fill ms-1 form-control">Order
                                        now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
