@extends('layouts.app')
<!-- Navbar -->
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
                {{ config('app.name', 'Laravel') }}
            </a> <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
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

<!-- Background image -->
<div class="p-5 text-center bg-image" style="
      background-image: url('{{ asset('src/interstellar.jpg') }}');
      height: 400px;
    ">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">Selamat Datang, {{Auth::user()->name}}</h1>
                <h4 class="mb-3">
                    <div id="time"></div>
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4 mb-3">
            <div class="d-flex justify-content-end">
                <div class="input-group">
                    <div class="form-outline">
                        <input id="search-input" type="search" id="form1" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button id="search-button" type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5">
        <h3><b>Newest Film</b></h3>
        <div class="card" style="width: 40vh;">
            <a href="" class="text-dark">
                <div class="bg-image hover-zoom">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/c/cd/Poster_film_Harry_Potter_and_The_Order_of_Phoenix_%282007%29.jpg/640px-Poster_film_Harry_Potter_and_The_Order_of_Phoenix_%282007%29.jpg" class="card-img-top" alt="Sunset Over the Sea" />
                    <h5 class="mt-3">Harry Potter and the ord ...</h5>
                    <h6>2023</h6>
                </div>
            </a>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="">Load More...</a>
        </div>
    </div>

    <div class="mb-5">
        <h3><b>Action Film</b></h3>
        <div class="card" style="width: 40vh;">
            <a href="" class="text-dark">
                <div class="bg-image hover-zoom">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/c/cd/Poster_film_Harry_Potter_and_The_Order_of_Phoenix_%282007%29.jpg/640px-Poster_film_Harry_Potter_and_The_Order_of_Phoenix_%282007%29.jpg" class="card-img-top" alt="Sunset Over the Sea" />
                    <h5 class="mt-3">Harry Potter and the ord ...</h5>
                    <h6>2023</h6>
                </div>
            </a>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="">Load More...</a>
        </div>
    </div>

    <div class="mb-5">
        <h3><b>Horror Film</b></h3>
        <div class="card" style="width: 40vh;">
            <a href="" class="text-dark">
                <div class="bg-image hover-zoom">
                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/c/cd/Poster_film_Harry_Potter_and_The_Order_of_Phoenix_%282007%29.jpg/640px-Poster_film_Harry_Potter_and_The_Order_of_Phoenix_%282007%29.jpg" class="card-img-top" alt="Sunset Over the Sea" />
                    <h5 class="mt-3">Harry Potter and the ord ...</h5>
                    <h6>2023</h6>
                </div>
            </a>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="">Load More...</a>
        </div>
    </div>
</div>
<!-- Background image -->