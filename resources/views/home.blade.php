@extends('layouts.app')
<!-- Halaman Dashboard -->
@section('content')
<div class="container-xl bg-white p-4 shadow-sm rounded border border-light-subtle">
    <div class="row justify-content-center m-2">
        <div class="col-md-12">
            <div class="card bg-light h-100">
                <div class="card-body justify-content-center">
                    <div class="d-flex justify-content-center align-items-center mb-2">
                        <img class="logo-bms" src="{{ asset('assets/images/banyumaslogo.svg') }}" alt="banyumaslogo">
                    </div>
                    <h1 class="text-center fw-bold">SAVIRA</h1>
                    <p class="text-center fs-4">SAVIRA merupakan Sistem Penyimpanan Arsip Vital Terintegrasi</p>
                    <p class="text-center fs-5 fw-semibold">Selamat Datang, {{ Auth::user()->name }}</p>
                    <p class="text-center">Unit Kerja : {{ Auth::user()->instansi->nama_instansi }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center g-2 m-3">
        @if (Auth::user()->role == 'spadmin')
            <div class="col-sm-12 col-md-4">
                <div class="card bg-light h-100 mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah Arsip</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $arsips->count() }}</div>
                            </div>
                            <img src="{{ asset('assets/images/archive.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-arsip') }}" class="btn btn-dark btnlink w-100 text-center">
                            <span> Lihat Daftar Arsip </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card bg-light h-100 mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah User</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $users->count() }}</div>
                            </div>
                            <img src="{{ asset('assets/images/users.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-user') }}" class="btn btn-dark btnlink w-100 text-center">
                            <span>Lihat Daftar User</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card bg-light h-100 mb-2">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah Unit Kerja</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $instansis->count() }}</div>
                            </div>
                            <img src="{{ asset('assets/images/buildings.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-instansi') }}" class="btn btn-dark btnlink w-100 text-center">
                            <span>Lihat Daftar Unit Kerja</span>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="col">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah Arsip</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $arsips->count() }}</div>
                            </div>
                            <img src="{{ asset('assets/images/archive.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-arsip') }}" class="btn btn-dark btnlink w-100 text-center">
                            <span>Lihat Daftar Arsip</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->role == 'admin')
                <div class="col">
                    <div class="card bg-light h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <h6 class="">Jumlah User</h6>
                                    <div class="text-lg fs-3 fw-bold">{{ $users->count() }}</div>
                                </div>
                                <img src="{{ asset('assets/images/users.svg') }}" class="img-fluid rounded-start" alt="arsip">
                            </div>
                        </div>
                        <div class="card-footer d-grid">
                            <a href="{{ route('daftar-user') }}" class="btn btn-dark btnlink w-100 text-center">
                                <span>Lihat Daftar User</span>
                            </a>
                        </div>
                    </div>
                </div>
        @endif
    </div>
</div>
@endsection
