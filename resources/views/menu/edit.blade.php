@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Menu</div>

                    <div class="card-body">
                        <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="nama" required
                                    value="{{ $menu->nama }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto</label><br>
                                <img src="{{ asset('storage/' . $menu->foto) }}" alt="" width="100px">
                                <input type="file" class="form-control mt-2" name="foto">

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" required
                                    value="{{ $menu->harga }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" class="form-control" required>{{ $menu->keterangan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-select" name="kategori_id">
                                    <option selected>Pilih kategori</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{ $kt->id }}" @selected($menu->kategori_id == $kt->id)>{{ $kt->Nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
