@extends('layouts.app')
@include('components.navbar.navbarUser')
<!-- Banner image -->
<div class="p-5 text-center bg-image img-fluid" style="
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
        <div class="row d-flex">
          <div class="col-md-4 justify-content-center">
            <img src="/storage/poster/{{$data->poster}}" class="img-fluid posterReview" alt="">
          </div>
          <div class="col-md-8 justify-content-center">
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

        <!-- Message Response successfully -->
        @if (session()->has('success'))
        <script>
          alert('Successfully To Add Rating, Thank you!');
        </script>
        @endif

        <!-- Message Response failed -->
        @if (session()->has('failed'))
        <script>
          alert('There is something wrong with the system');
        </script>
        @endif

        <h4>Rating Star</h4>
        <form action="/review/feedback" method="post">
          @csrf
          <input type="hidden" name="id_movie" value="{{$data->id}}">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="starReview" id="inlineRadio1" value="1" />
            <label class="form-check-label" for="inlineRadio1">Star 1</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="starReview" id="inlineRadio2" value="2" />
            <label class="form-check-label" for="inlineRadio2">Star 2</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="starReview" id="inlineRadio2" value="3" />
            <label class="form-check-label" for="inlineRadio2">Star 3</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="starReview" id="inlineRadio2" value="4" />
            <label class="form-check-label" for="inlineRadio2">Star 4</label>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="starReview" id="inlineRadio2" value="5" />
            <label class="form-check-label" for="inlineRadio2">Star 5</label>
          </div>

          <div class="mt-3">
            <textarea name="previewDescription" id="" cols="30" rows="10" class="form-control" placeholder="Add Description"></textarea>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-sm">Give feedback</button>
          </div>
        </form>
        @endguest
      </div>
    </div>
  </div>
</div>