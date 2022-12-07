@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Menu</div>

                    <div class="card-body">
                        <a href="{{ url('menu/create') }}" class="btn btn-primary mb-2">Tambah Menu</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$item->foto) }}" alt="" width="100px">
                                        </td>
                                        <td><span class="badge bg-primary">Rp {{ $item->harga }}</span></td>
                                        {{-- <td>{{ $item->harga }}</td> --}}
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->kategori->Nama }}</td>
                                        <td>
                                            <a href="{{ route('menu.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('delmenu/' . $item->id) }}" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection