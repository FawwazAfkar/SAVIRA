@extends('layouts.app')


@section('content')
<div class="container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR USER') }}</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputUser">
                        <i class='bx bxs-folder-plus'></i>
                        <span>Tambah User</span>
                    </button>
                </div>
            </div>
            <x-user.create :instansi="$instansis"/>

            <table id="data" class="table table-responsive table-bordered table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>Role</th>
                        <th>Instansi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->instansi->nama_instansi }}</td>
                            <td class="d-flex gap-2 justify-content-center">
                                <!-- Button Aksi -->
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateUser{{ $user->id }}"><i class='bx bx-edit'></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}"><i class='bx bx-trash'></i></button>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                        <x-user.update :instansi="$instansis" :user="$user"/>
                        <x-user.delete :user="$user"/>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
