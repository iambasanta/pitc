@extends('layouts.admin.main')
@section('title','PITC | Login')
@section('content')
<div class="container w-25 mt-5">
    <div class="form-wrapper border rounded p-4 bg-white">
        <h3 class="text-center">Login</h3>
        <form action="{{route('admin.login')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email" class="mb-2">Email</label>
                <input type="email" class="form-control mb-2 @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" required>
                @error('email')
                <span class="text-sm invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="mb-2">Password</label>
                <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" name="password" required>
                @error('password')
                <span class="text-sm invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection

