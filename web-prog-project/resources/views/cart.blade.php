@extends('layouts.main')
@section('container')
@auth
@if (auth()->user()->role === "customer")
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-center pt-3 pb-3">
    <div class="d-flex flex-column">
            <div class="d-flex justify-content-center">
                <h1 class="text-white text-align-center">Cart</h1>
            </div>
            
           <table class="table">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"><i class="bi bi-x-circle-fill"></i></th>
                <td>[Product Name]</td>
                <td>[Price]</td>
                <td>[Description]</td>
                <td>
                    <div class="d-flex">
                        <div class="input-group flex-nowrap">
                        <input type="number" class="form-control bg-secondary me-2" aria-label="Username" aria-describedby="addon-wrapping" style="width: 80px">
                    </div>
                    <button class="btn btn-outline-success bg-success text-light" type="submit"><i class="bi bi-check-circle-fill"></i></button>
                    </div>
                </td>
                <td>[Total]</td>
                </tr>
                <tr>
                <th scope="row"><i class="bi bi-x-circle-fill"></i></th>
                <td>[Product Name]</td>
                <td>[Price]</td>
                <td>[Description]</td>
                <td>[Quantity]</td>
                <td>[Total]</td>
                </tr>
            </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Checkout</button>
            </div>
     </div>

        
    </div>

@else
    <div class="alert alert-danger text-center">
        <strong>Please login with customer role!</strong>
    </div>
    <script>
        setTimeout(function(){
            window.location.href = '/';
        }, 3000); // Redirect after 3 seconds
    </script>
@endif
@endauth