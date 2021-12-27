@extends('layouts.admin.main')
@section('title','PITC | Categories')
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
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Categories</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categories</a></li>
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
                        <h4>All Categories</h4>
                        <a href="{{route('categories.create')}}" class="btn btn-success">Add New</a>
                    </div>
                    <x-util.flash />
                </div>
                <div class="card-body">
                    @if(! $categories->count())
                    <div class="alert alert-light-danger color-danger">
                        <strong>No records found!</strong>
                    </div>
                    @else
                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Category Name</th>
                                <th>Post Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{route('categories.edit',$category->id)}}" class="p-2 text-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="p-2 text-danger" onclick="event.preventDefault();confirm('Are you sure ?');document.getElementById('delete-form-{{$category->id}}').submit();">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="delete-form-{{$category->id}}" action="{{route('categories.destroy',$category->id)}}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td>{{$category->title}}</td>
                                <td>{{$category->posts->count()}}</td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
