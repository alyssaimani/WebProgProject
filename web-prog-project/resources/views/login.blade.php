@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-center">
        <div class="card p-5 m-5 d-flex flex-row" style="width: 75%; height: 600px">
        <form action="/login" method="POST" style="width: 35%">
            @csrf
            <h2>Login</h2>
            <p class="m-0 mt-4">Your Email</p>
            <input type="text" name="email" id="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ Cookie::get('remember') ? Cookie::get('email') : old('email') }}" autofocus>
            <p class="m-0 mt-4">Password</p>
            <input type="password" name="password" id="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="{{ Cookie::get('remember') ? Cookie::get('password') : old('password') }}">
            <div class="container p-0 mt-4">
                <div class="row">
                    <div class="form-check col-5">
                    <input class="form-check-input w-64" name="remember" type="checkbox" id="flexCheckDefault" {{ Cookie::get('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <div class="d-flex justify-content-end col">
                    <p>New here?</p>
                    <a href="/register">Sign Up Here!</a>
                </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn bg-primary text-light mt-5 mb-3">
                Login
            </button>
            </div>
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
            @if($message = Session::get('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @endif
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

        </form>
        <img src="images/login.svg" class="ps-5" style="width: 55%" alt="">
    </div>
    </div>
    
@endsection