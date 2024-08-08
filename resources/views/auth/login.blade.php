@extends('layouts.app')

@section('content')

{{-- Checking Session first --}}
@if(Auth::user())
    <script>
        window.location = "{{ route('home') }}";
    </script>

@else
{{-- Login Form --}}
<div class="container d-flex align-items-center justify-content-center vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header flex flex-col items-center text-center" style="pointer-events: none">
                    <x-app-logo class="w-20 h-20" /><br/>
                    <span class="fs-5 font-bold text-gray-500">Selamat Datang di SAVIRA</span>
                </div>

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">

                            <div class="col-md-6 text-center">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Ingatkan Saya') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-15 text-center">
                                <button type="submit" class="btn btn-primary" style="width: 100px">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        {{-- @if (Route::has('password.request'))
                            <div class="row mb-3">
                                <div class="col-md-15 text-center">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            </div>
                        @endif --}}
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
