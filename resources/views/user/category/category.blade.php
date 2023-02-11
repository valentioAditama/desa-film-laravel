@extends('layouts.app')
@include('components.navbar.navbarUser')
<!-- input category -->
<div class="container mt-5 mb-3">
    <div class="row">
        <div class="col-md-4">
            <h6>Category</h6>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-dark">Search</button>
            </div>
        </div>
    </div>

    <!-- Content show  search -->
    <div class="mt-5">
        <div class="row">
            <h5>Result Category </h5>
            <div class="col-md-2">
                <a href="">
                    <img src="storage/poster/1675975226.jpg" class="img-fluid posterCategory" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- Category Adventure  -->
    <div class="mt-5">
        <div class="row">
            <h5>Adventure </h5>
            <div class="col-md-2">
                <a href="">
                    <img src="storage/poster/1675975226.jpg" class="img-fluid posterCategory" alt="">
                </a>
            </div>
        </div>
    </div>

</div>