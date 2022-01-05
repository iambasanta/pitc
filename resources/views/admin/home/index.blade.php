@extends('layouts.admin.main')
@section('title','PITC | Home')
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
                    <h3>Dashboard</h3>
                </div>
                <div class="order-first col-12 col-md-6 order-md-2">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">

                    @role('super-admin')
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="px-3 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="font-semibold text-muted">
                                                <a href="{{route('admin.users.index')}}">Admin Users</a>
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">{{$adminUsers->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                    @role(['super-admin','blog-manager'])
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="px-3 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldPaper"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="font-semibold text-muted">
                                                <a href="{{route('admin.posts.index')}}">Blog Posts</a>
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">{{$blogPosts->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                    @role(['super-admin','event-manager'])
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="px-3 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldCalendar"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="font-semibold text-muted">
                                                <a href="{{route('admin.events.index')}}">Events</a>
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">{{$events->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                    @role(['super-admin','member-manager'])
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="px-3 card-body py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldUser"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="font-semibold text-muted">
                                                <a href="{{route('admin.members.index')}}">Club Members</a>
                                            </h6>
                                            <h6 class="mb-0 font-extrabold">{{$members->count()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole

                </div>
            </div>
        </section>
    </div>
</div>
@endsection
