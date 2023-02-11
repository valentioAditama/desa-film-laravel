@extends('layouts.app')
@include('components.navbar.navbarUser')
<!-- Banner image -->
<div class="p-5 text-center bg-image" style="
      background-image: url(/storage/banner/{{$data->banner}});
      height: 400px;
    ">
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white">
                <h1 class="mb-3">{{$data->title}}</h1>
                <h4 class="mb-3">
                    {{$data->category}}
                </h4>
            </div>
        </div>
    </div>
</div>

<div class="container contentReview">
    <!-- content -->
    <div class="row">
        <div class="col-md-9">
            <div class="mb-3">
                <h3>{{$data->title}}</h3>
                <h6>{{$data->category}}</h6>
            </div>
            <div class="mb-3">
                <img src="/storage/banner/{{$data->banner}}" class="img-fluid bannerReview" alt="">
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <p>{{$data->description}}</p>
                    </div>
                    <div class="col-md-6">
                        <img src="/storage/poster/{{$data->poster}}" class="img-fluid posterReview" alt="">
                    </div>
                    <iframe src="{{$data->link_trailer}}" class="trailerReview" frameborder="0"></iframe>
                </div>
                <a href="{{$data->link_film}}" class="btn btn-dark btn-lg mt-3">Klik Movie</a>
            </div>
        </div>
    </div>

    <!-- comment content -->
    @guest
    @if (Route::has('login'))
    <!--  -->
    @endif
    @else
    <div class="row mt-5 mb-4">
        <div class="col-md-8">
            <h6>Comment</h6>
            <div class="input-group">
                <form action="" method="post">
                    <div class="form-outline">
                        <input id="search-input" type="search" id="form1" class="form-control" />
                        <label class="form-label" for="form1">Search</label>
                    </div>
                    <button id="search-button" type="button" class="btn btn-primary">
                        post
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endguest
</div>