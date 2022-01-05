@extends('layouts.admin.main')
@section('title','PITC | Admin Users')
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="order-last col-12 col-md-6 order-md-1">
                    <h3>Admins</h3>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Admins</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4>All Admin Users</h4>
                        <a href="{{route('admin.users.create')}}" class="btn btn-success">Add New</a>
                    </div>
                    <x-util.flash />
                </div>
                <div class="card-body">
                    @if(!$users->count())
                    <div class="alert alert-light-danger color-danger">
                        <strong>No records found!</strong>
                    </div>
                    @else
                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    <a href="{{route('admin.users.edit',$user->id)}}" class="p-2 text-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="p-2 text-danger" onclick="event.preventDefault();confirm('Are you sure ?');document.getElementById('delete-form-{{$user->id}}').submit();">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="delete-form-{{$user->id}}" action="{{route('admin.users.destroy',$user->id)}}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles->first()->display_name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{$users->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
