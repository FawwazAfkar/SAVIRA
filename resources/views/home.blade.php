@extends('layouts.app')
<!-- Halaman Dashboard -->
@section('content')
<div class="container-xl bg-white p-4 rounded">
    <div class="row justify-content-center m-2">
        <div class="col-md-12">
            <div class="card bg-light h-100">
                <div class="card-body justify-content-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/images/banyumaslogo.svg') }}" alt="logo">
                    </div>
                    <h1 class="text-center fw-bold">SAVIRA</h1>
                    <p class="text-center fs-5">SAVIRA merupakan Sistem Penyimpanan Arsip Vital Regional Banyumas</p>
                    <p class="text-center fs-6 fw-semibold">Selamat Datang, {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-start m-2">
        @if (Auth::user()->role == 'spadmin')
            <div class="col">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah Arsip</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $arsipvitalCount }}</div>
                            </div>
                            <img src="{{ asset('assets/images/archive.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-arsip') }}" class="btn btn-dark btnlink w-100 text-center">
                            <small> Lihat Daftar Arsip </small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah User</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $userCount }}</div>
                            </div>
                            <img src="{{ asset('assets/images/users.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-user') }}" class="btn btn-dark btnlink w-100 text-center">
                            <small>Lihat Daftar User</small>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <h6 class="">Jumlah Unit Kerja</h6>
                                <div class="text-lg fs-3 fw-bold">{{ $instansiCount }}</div>
                            </div>
                            <img src="{{ asset('assets/images/buildings.svg') }}" class="img-fluid rounded-start" alt="arsip">
                        </div>
                    </div>
                    <div class="card-footer d-grid">
                        <a href="{{ route('daftar-instansi') }}" class="btn btn-dark btnlink w-100 text-center">
                            <small>Lihat Daftar Unit Kerja</small>
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
                            <small>Lihat Daftar Arsip</small>
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
                                <small>Lihat Daftar User</small>
                            </a>
                        </div>
                    </div>
                </div>
        @endif
    </div>
</div>
@endsection
