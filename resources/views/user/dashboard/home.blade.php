@extends('layouts.app')
@include('components.navbar.navbarUser')
<!-- Banner image -->
<div class="p-5 text-center bg-image" style="
      background-image: url('{{ asset('src/interstellar.jpg') }}');
      height: 400px;
    ">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">Selamat Datang, {{Auth::user()->name ?? 'guest'}}</h1>
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
        <div class="row">
            <h3><b>Newest Film</b></h3>
            @foreach($data as $movie)
            <div class="col-md-2">
                <div class="card shadow-0">
                    <a href="/review/{{$movie->id}}" class="text-dark">
                        <div class="bg-image hover-zoom">
                        <img src="/storage/poster/{{$movie->poster}}" class="card-img-top posterHome" alt="Sunset Over the Sea" />
                            <h5 class="mt-3">{{$movie->title}}</h5>
                            <h6>2010</h6>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="">Load More...</a>
        </div>
    </div>
</div>
<!-- Background image -->