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
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <img src="/storage/poster/{{$data->poster}}" class="img-fluid posterReview" alt="">
                    </div>
                    <div class="col-md-6">
                        <p>{{$data->description}}</p>
                    </div>
                    <iframe src="{{$data->link_trailer}}" class="trailerReview mt-3" frameborder="0"></iframe>
                </div>
                <a href="{{$data->link_film}}" class="btn btn-dark btn-lg mt-3">Watch Movie</a>
            </div>
            <div class="mt-5">
                <!-- comment content -->
                @guest
                @if (Route::has('login'))
                <!--  -->
                @endif
                @else
                <h6>Rating</h6>
                
                @endguest
            </div>
        </div>
    </div>
</div>