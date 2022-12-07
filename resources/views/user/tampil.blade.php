@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data User</div>

                    <div class="card-body">
                        <a href="{{ url('user/create') }}" class="btn btn-primary mb-2">Tambah User</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->password }}</td>
                                        @if ($item->role == 'owner')
                                            <td><span class="badge bg-primary">{{ $item->role }}</span></td>
                                        @else
                                            <td><span class="badge bg-success">{{ $item->role }}</span></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            <a href="{{ url('deluser/' . $item->id) }}" class="btn btn-danger">Hapus</a>
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
