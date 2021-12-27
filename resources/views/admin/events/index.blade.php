@extends('layouts.admin.main')
@section('title','PITC | Events')
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
                    <h3>Manage Events</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.events.index')}}">Events</a></li>
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
                        <div class="d-flex space-between">
                            <h4>
                                <a href="?status=all">All</a> |
                                <a href="?status=upcoming">Upcomming</a> | 
                                <a href="?status=completed">Completed</a>
                            </h4>
                        </div>
                        <a href="{{route('admin.events.create')}}" class="btn btn-success">Add New</a>
                    </div>
                    <x-util.flash />
                </div>
                <div class="card-body">
                    @if(! $events->count())
                    <div class="alert alert-light-danger color-danger">
                        <strong>No records found!</strong>
                    </div>
                    @else
                        @include('admin.events.table')
                    @endif
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            {{$events->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
