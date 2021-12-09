@extends('layouts.admin.main')
@section('title','PITC | Members')
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
                    <h3>General Admin</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('members.index')}}">Members</a></li>
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
                        <h4>All Members</h4>
                        <a href="{{route('members.create')}}" class="btn btn-success">Add Member</a>
                    </div>
                    @if(session('message'))
                    <div class="alert alert-light-success color-success mt-4">
                        {{session('message')}}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Batch</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                            <tr>
                                <td>
                                    <a href="{{route('members.edit',$member->id)}}" class="p-2 text-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="#" class="p-2 text-danger" onclick="event.preventDefault();document.getElementById('delete-member-form').submit();">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="delete-member-form" action="{{route('members.destroy',$member->id)}}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-block">
                                        <img src="{{asset('storage/'.$member->image)}}" alt="" class="rounded-circle" style="width: 40px; height:40px;">
                                        <span class="p-2">
                                            {{$member->name}}
                                        </span>
                                    </div>
                                </td>
                                <td>{{$member->email}}</td>
                                <td>{{$member->designation}}</td>
                                <td>
                                    {{$member->batch}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{$members->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
