@extends('layouts.main')
@section('container')
    

    @if (auth()->check())
    <div class="d-flex justify-content-center p-5">
            <img style="width: 50%" src="images/about_us.svg" alt="">
            <div class="d-flex flex-column justify-content-center align-content-center text-light">
                <h1>Nothing matter except the satisfaction of our customer</h1>
                <p class="fst-italic">Providing you with the best stationary you'll ever met</p>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center">
            <div class="card p-5 m-5" style="width: 75%;">
                <div class="card">
                    <img src="images/image.jpg" class="card-img opacity-100" alt="...">
                    <div class="card-img-overlay">
                        <div class="d-flex flex-row h-75 justify-content-center">
                        <h2 class="card-title mt-auto" style="color:white">We provide all of your book and stationary needs</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
@endsection