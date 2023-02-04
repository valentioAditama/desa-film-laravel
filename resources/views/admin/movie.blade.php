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
                            <h1 class="card-text mb-3">100</h1>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('icon/group.png') }}" class="img-fluid h-10" style="height: 15vh;" alt="">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary">Load More</button>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <h3>Data Movie</h3>
            <table id="table_id" class="table table-sm table-bordered">
                <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>description</th>
                    <th>Link Film</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Peanut Butter</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Peanut Butter</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Peanut Butter</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Peanut Butter</td>
                        <td>10</td>
                        <td>10</td>
                        <td>10</td>
                        <td>
                            <button class="btn btn-primary">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a href="/dataMovie">Load More</a>
            </div>
        </div>