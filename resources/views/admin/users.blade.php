@extends('layouts.app')
@include('components.navbar.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-4 mt-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Data Users</h5>
                            <h1 class="card-text mb-3">{{$dataContainer}}</h1>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('icon/group.png') }}" class="img-fluid h-10" style="height: 15vh;" alt="">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary btn-sm">Load More</button>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3>Data Users</h3>
            <button type="button" class="btn btn-success btn-sm mb-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                Add Users
            </button>

            <!-- Message Response successfully -->
            @if (session()->has('success'))
            <script>
                alert('Data has been saved');
            </script>
            @endif

            <!-- Message Response data already exist -->
            @if (session()->has('data-already'))
            <script>
                alert('Data Already Exist');
            </script>
            @endif

            <!-- Message Response data already exist -->
            @if (session()->has('data-already'))
            <script>
                alert('Data Already Exist');
            </script>
            @endif

            <table class="table table-sm table-bordered">
                <thead>
                    <th>No</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $users)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->role }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
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
@include('components.modal.add-user')