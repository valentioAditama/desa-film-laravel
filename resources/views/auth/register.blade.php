@extends('layouts.app')
<img src="{{ asset('src/login.jpg') }}" class="bg-login"/>
<div class="container">
    <div class="form-login">
        <div class="col-md-8">
            <div class="card card-login">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="text-center mb-4">
                                <h3>Register</h3>
                                <h6>Ayo daftar segera mungkin yaa <br>film sedang menunggu mu</h6>
                            </div>
                            <div class="col-md-6">
                                <input id="name" type="text" class="bg-dark shadow-none border-0 text-light form-control @error('name') is-invalid @enderror" name="name" placeholder="Fullname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-md-6">
                                <input id="email" type="email" class="bg-dark shadow-none border-0 text-light form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">

                            <div class="col-md-6">
                                <input id="password" type="password" class="bg-dark shadow-none border-0 text-light form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="bg-dark shadow-none border-0 text-light form-control" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary container mb-3 bg-dark shadow-none border-0">
                                    {{ __('Register') }}
                                </button>
                                <div class="text-end">
                                    <a href="/login">Sudah punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>