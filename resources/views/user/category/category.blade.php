@extends('layouts.app')
@include('components.navbar.navbarUser')
<!-- input category -->
<div class="container mt-5 mb-3">
    <div class="row">
        <form action="/category" method="GET">
            <div class="input-group">
                <div class="form-outline">
                    <input id="search-input" type="search" id="form1" name="searchCategory" class="form-control" value="{{$searchValue}}" />
                    <label class="form-label" for="form1">Search Category</label>
                </div>
                <button id="search-button" type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <!-- Content show  search -->
    <div class="mt-5">
        <div class="row">
            <h5>Result Category </h5>
            @foreach($showingSearch as $categoryComputer)
            <div class="col-md-2 mb-3">
                <a href="/review/{{$categoryComputer->id}}">
                    <img src="/storage/poster/{{$categoryComputer->poster}}" class="card-img-top posterHome" alt="">
                </a>
            </div>
            @endforeach
        </div>
    </div>

</div>