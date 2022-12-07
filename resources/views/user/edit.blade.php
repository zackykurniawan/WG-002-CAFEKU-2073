@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit User</div>

                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" required
                                    value="{{ $user->email }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required
                                    value="{{ $user->password }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select class="form-select" name="role">
                                    <option selected disabled>Pilih role</option>
                                    <option value="owner" @selected($user->role == 'owner')>Owner</option>
                                    <option value="admin" @selected($user->role == 'admin')>Admin</option>
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
