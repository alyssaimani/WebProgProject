@extends('layouts.main')

@section('container')
<div class="d-flex justify-content-center">
        <div class="card p-5 m-5 d-flex flex-row" style="width: 75%; height: 600px">
        <form action="/register" method="POST" style="width: 35%">
            @csrf
            <h2>Register</h2>
            <p class="m-0 mt-4">Your Name</p>
            <input type="text" name="name" id="name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('name') }}" autofocus>
            <p class="m-0 mt-4">Your Email</p>
            <input type="email" name="email" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ old('email') }}">
            <p class="m-0 mt-4">Password</p>
            <input type="password" name="password" id="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <div class="d-flex justify-content-center mt-4">
                <p>Already have an account?</p>
                <a href="/login">Log In Here!</a>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn bg-primary text-light mt-3 mb-3">
                Register
            </button>
            </div>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </form>
        <img src="images/register.svg" class="ps-5" style="width: 65%" alt="">
    </div>
    </div>
    
@endsection