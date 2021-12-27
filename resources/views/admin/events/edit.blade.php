@extends('layouts.admin.main')
@section('title','PITC | Edit Event')
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
                    <h3>Edit Event</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.events.index')}}">Events</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <form action="{{route('admin.events.update',$event->id)}}" method="POST" enctype="multipart/form-data" id="post-form">
            @csrf

            @method('PATCH')

            @include('admin.events.form')
        </form>
    </div>
</div>
@endsection

@section('script')

@include('admin.events.script')

@endsection
