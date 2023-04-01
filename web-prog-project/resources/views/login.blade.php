@extends('layouts.template')

@section('container')
    <div class="d-flex justify-content-center">
        <div class="card p-5 m-5 d-flex flex-row" style="width: 75%">
        <form action="" style="width: 35%">
            <h2>Login</h2>
            <p class="m-0 mt-4">Your Email</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <p class="m-0 mt-4">Password</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <div class="d-flex mt-4">
                <div class="form-check">
                    <input class="form-check-input w-64" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember me
                    </label>
                </div>
                <p class="ps-3">New here?</p>
                <a href="/register">Sign Up Here!</a>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn bg-primary text-light mt-5">
                Login
            </button>
            </div>
        </form>
        <img src="images/login.svg" class="ps-5" style="width: 55%" alt="">
    </div>
    </div>
    
@endsection