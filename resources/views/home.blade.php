@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        @if (Auth::user()->role == 'spadmin')
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Jumlah Arsip') }}</div>
                    <div class="card-body">
                        {{ __('Total Arsip: ') }}{{ $arsipvitalCount }}
                    </div>
                </div>
            </div>

            <div class="row justify-content-center m-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Jumlah User') }}</div>
                        <div class="card-body">
                            {{ __('Total User: ') }}{{ $userCount }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Jumlah Instansi') }}</div>
                        <div class="card-body">
                            {{ __('Total Instansi: ') }}{{ $instansiCount }}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Jumlah Arsip') }}</div>
                    <div class="card-body">
                        {{ __('Total Arsip in your Instansi: ') }}{{ $arsips->count() }}
                    </div>
                </div>
            </div>
        @endif

        @if (Auth::user()->role == 'admin')
            <div class="row justify-content-center m-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Jumlah User in Your Instansi') }}</div>
                        <div class="card-body">
                            {{ __('Total User: ') }}{{ $users->count() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
