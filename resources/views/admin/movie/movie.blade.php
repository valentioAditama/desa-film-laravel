@extends('layouts.app')
@include('components.navbar.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Data Movie</h5>
                            <h1 class="card-text mb-3">{{$dataContainer}}</h1>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('icon/movie.png') }}" class="img-fluid h-10" style="height: 15vh;" alt="">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">Load More</button>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <h3>Data Movie</h3>
            <a href="/dataMovie/create" class="btn btn-success btn-sm mb-3">Add Movie</a>

            <!-- Message Response successfully -->
            @if (session()->has('success'))
            <script>
                alert('Data has been saved');
            </script>
            @endif

            <!-- Message Response Deleted -->
            @if (session()->has('data-deleted'))
            <script>
                alert('Data Has Been Deleted')
            </script>
            @endif

            <table id="table_id" class="table table-sm table-bordered">
                <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>description</th>
                    <th>Poster</th>
                    <th>Banner</th>
                    <th>Link Film</th>
                    <th>Trailer Youtube</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $movie)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->category }}</td>
                        <td id="description">{{ substr($movie->description, 0, 20) }}...</td>
                        <td>
                            <a href="/storage/poster/{{$movie->poster}}">{{$movie->poster}}</a>
                        </td>
                        <td>
                            <a href="/storage/banner/{{$movie->banner}}">{{$movie->banner}}</a>
                        </td>
                        <td>{{ $movie->link_film }}</td>
                        <td>
                            <iframe src="{{$movie->link_trailer}}" height="100" width="180" frameborder="0"></iframe>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" data-mdb-toggle="modal" data-mdb-target="#editmodal{{$movie->id}}">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm" data-mdb-toggle="modal" data-mdb-target="#staticBackdrop{{$movie->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>
<script>
    // get id element html
    let textDescription = document.getElementById("description").innerText;

    // create max length text description
    let maxLength = textDescription.substr(0, 175);
    document.getElementById("description").innerHTML = maxLength + "...";
</script>

@include('components.modal.admin-movie.delete-movie');
@include('components.modal.admin-movie.edit-movie');