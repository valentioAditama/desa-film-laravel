@extends('layouts.app')
<img src="{{ asset('src/login.jpg') }}" class="bg-login"/>
<div class="container">
    <div class="form-login">
        <div class="col-md-8">
            <div class="card card-login">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3 justify-content-center opacity-100">
                            <div class="text-center mb-4">
                                <h3>Login</h3>
                                <h6>Nikmati film di manapun dan kapanpun!</h6>
                            </div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="bg-dark text-light shadow-none border-0 form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center opacity-100">
                            <div class="col-md-6">
                                <input id="password" type="password" class="bg-dark text-light shadow-none border-0 form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary container bg-dark border-0">
                                    {{ __('Login') }}
                                </button>
                                <div class="text-center mt-3">
                                    <a href="/register">Belum punya akun?</a>
                                </div>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
