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

            {{-- Call Modal --}}
            <x-user.create :instansi="$instansis"/>

            {{-- Call alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            {{-- User Table --}}
            <table id="datauser" class="table table-responsive table-bordered table-striped display align-middle">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>E-Mail</th>
                        <th>Role</th>
                        <th>Unit Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->instansi->nama_instansi }}</td>
                            <td class="align-middle">
                                <!-- Button Aksi -->
                                <div class="d-flex gap-2 justify-content-center">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateUser{{ $user->id }}"><i class='bx bx-edit'></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{ $user->id }}"><i class='bx bx-trash'></i></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                        <x-user.update :instansis="$instansis" :user="$user"/>
                        <x-user.delete :user="$user"/>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
