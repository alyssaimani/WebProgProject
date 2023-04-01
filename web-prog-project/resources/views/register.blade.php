@extends('layouts.template')

@section('container')
    <div class="d-flex justify-content-center">
        <div class="card p-5 m-5 d-flex flex-row" style="width: 75%">
        <form action="" style="width: 35%">
            <h2>Register</h2>
            <p class="m-0 mt-4">Your Name</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <p class="m-0 mt-4">Your Email</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <p class="m-0 mt-4">Password</p>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <div class="d-flex justify-content-center mt-4">
                <p>Already have an account?</p>
                <a href="/login">Log In Here!</a>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn bg-primary text-light mt-3">
                Register
            </button>
            </div>
        </form>
        <img src="images/register.svg" class="ps-5" style="width: 65%" alt="">
    </div>
    </div>
    
@endsection