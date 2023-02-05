@extends('layouts.app')
@include('components.navbar.navbar')
<div class="container">
    <h4 class="mt-4">Create Data Movie</h4>
    <small>Created Data movie for everyone can Watching</small>

    <div class="mt-4">
        <form action="" method="POST">
            @csrf

            <!-- Title input -->
            <div class="form-outline mb-4">
                <input type="text" id="title" class="form-control" name="title" required />
                <label class="form-label" for="title">title</label>
            </div>

            <!-- Category input -->
            <div class="form-outline mb-4">
                <input type="text" id="category" class="form-control" name="category" required />
                <label class="form-label" for="category">Category</label>
            </div>

            <!-- link_film input -->
            <div class="form-outline mb-4">
                <input type="text" id="link_film" class="form-control" name="link_film" required />
                <label class="form-label" for="link_film">Link Movie From ZippyShare</label>
            </div>

            <!-- Link_trailer input -->
            <div class="form-outline mb-4">
                <input type="text" id="Link_trailer" class="form-control" name="link_trailer" required />
                <label class="form-label" for="Link_trailer">Link Trailer From Youtube</label>
            </div>

            <!-- Poster input -->
            <label for="">Poster Movie</label>
            <div class="form-outline mb-4">
                <input type="file" id="Poster" class="form-control" name="poster" required />
            </div>

            <!-- Category input -->
            <label for="">Descripton Movie</label>
            <div id="editor"></div>

            <div class="mt-4">
                <button class="btn btn-success btn-sm">Upload</button>
                <a href="/dashboard" class="btn btn-primary btn-sm">Back</a>
            </div>

        </form>
    </div>
</div>