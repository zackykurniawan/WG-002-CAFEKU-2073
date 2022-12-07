@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('order') }}" method="post" class="card">
                    @csrf
                    <div class="card-header">
                        Order
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pesanan</label>
                            <small class="me-auto form-text">Pakai tanda koma (,) untuk banyak pesanan</small>
                            <input type="text" class="form-control" name="pesanan">

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status"class="form-control">
                                <option selected disabled>Pilih status</option>
                                <option value="member">Member</option>
                                <option value="Non-Member">Non-Member</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Hasil Order</div>
                    <div class="card-body">
                        @isset($data)
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                            </div>
                            <label class="form-label">Jumlah Pesanan</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" value="{{ $data['jumlahpesanan'] }}" readonly>
                                <span class="input-group-text">pcs</span>
                            </div>
                            <label class="form-label">Total Pesanan</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" value="{{ $data['totalpesanan'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                            </div>
                            <label class="form-label">Diskon</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                            </div>
                            <label class="form-label">Total Pembayaran</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" value="{{ $data['totalpembayaran'] }}" readonly>
                            </div>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
