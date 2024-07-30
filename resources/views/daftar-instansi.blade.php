@extends('layouts.app')


@section('content')
<div class="container bg-white p-4 rounded">
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12 m-2 text-center">
                <div class="d-flex justify-content-between">
                    <h2 class="text-xl font-semibold leading-tight">{{ __('DAFTAR UNIT KERJA') }}</h2>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputInstansi">
                        <i class='bx bxs-folder-plus'></i>
                        <span>Tambah Unit Kerja</span>
                    </button>
                </div>
            </div>
            <x-instansi.create />

            {{-- call alert --}}
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

{{-- unit kerja is same as instansi --}}

            <table id="data" class="table table-responsive table-bordered table-striped display">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Unit Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @php $no = 1; @endphp
                        @foreach ($instansis as $instansi)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $instansi->nama_instansi }}</td>
                            <td>
                               <!-- Button Aksi -->
                                <div class="d-flex gap-2 justify-content-start">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateInstansi{{ $instansi->id }}"><i class='bx bx-edit'></i></button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteInstansi{{ $instansi->id }}"><i class='bx bx-trash'></i></button>
                                </div>
                            </td>
                        </tr>
                        <!-- Tempat Naruh Modal/Routes for Aksi -->
                        <x-instansi.update :instansi="$instansi"/>
                        <x-instansi.delete :instansi="$instansi"/>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
