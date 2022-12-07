@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="text-center">Daftar Menu</h2>
            @foreach ($data as $item)
                <div class="col-3 text-center me-3">
                    <div class="card my-3" style="width: 18rem; height: auto;">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top p-5">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <h5 class="card-text"><span class="badge text-bg-primary">Rp {{ $item->harga }}</span></h5>
                            <p class="card-text">{{ $item->keterangan }}</p>
                            <p class="card-text">Kategori : <span class="badge text-bg-warning">{{ $item->kategori->Nama }}</span></p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('footer')
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright: CAFEKU | Jl. Soekarno Hatta Kota Malang
        </div>
    </footer>
@endsection
