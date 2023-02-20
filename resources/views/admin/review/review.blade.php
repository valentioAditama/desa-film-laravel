@extends('layouts.app')
@include('components.navbar.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Data Review</h5>
                            <h1 class="card-text mb-3">{{$dataReview}}</h1>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('icon/review.png') }}" class="img-fluid h-10" style="height: 15vh;" alt="">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">Load More</button>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <h3>Data Review</h3>
            <table id="table_id" class="table table-sm table-bordered">
                <thead>
                    <th>No</th>
                    <th>Preview</th>
                    <th>Rating</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($dataReviewTable as $review)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $review->preview }}</td>
                        <td>{{ $review->rating }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end mb-4">
                <a href="/dataReview">Load More</a>
            </div>
        </div>
    </div>
</div>