@extends('layouts.app')
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Admin') }}
            </a> <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/dataUser">Data Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dataMovie">Data Movie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dataReview">Data Review</a>
                </li>
            </ul>
            <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
            <!-- Icon -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
        <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<div class="container">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Data Users</h5>
                            <h1 class="card-text mb-3">{{$dataContainer}}</h1>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('icon/group.png') }}" class="img-fluid h-10" style="height: 15vh;" alt="">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm">Load More</button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3>Data Users</h3>
            <button class="btn btn-success btn-sm mb-3">Add Data</button>
            <table id="table_id" class="table table-sm table-bordered">
                <thead>
                    <th>No</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $users)
                    <tr> 
                        <td>{{$no++}}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->role }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a href="/dataUser">Load More</a>
            </div>
        </div>