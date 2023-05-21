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
            
            @if($items->isNotEmpty())
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
                        @foreach ($items as $item)
                            <tr>
                                <th scope="row">
                                    <form id="delete-cart" action="{{ route('cart.destroy', $item->cartId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bi bi-x-circle-fill" type="submit" onclick="return confirm('Are you sure you want to delete this cart?')"></button>
                                    </form>
                                </th>
                                <td>{{ $item->productName }}</td>
                                <td>{{ $item->productPrice }}</td>
                                <td>{{ $item->productDescription }}</td>
                                <td>
                                    <form method="POST" action="{{ route('cart.update', $item->cartId) }}" onsubmit="return validateQuantity(this)">
                                        @csrf
                                        @method('PUT')
                                        <div class="d-flex">
                                            <div class="input-group flex-nowrap">
                                                <input type="number" name="quantity" class="form-control bg-secondary me-2 quantity-input" aria-label="Username" aria-describedby="addon-wrapping" style="width: 80px" value="{{ $item->quantity }}">
                                            </div>
                                            <button class="btn btn-outline-success bg-success text-light" type="submit"><i class="bi bi-check-circle-fill"></i></button>
                                        </div>
                                    </form>
                                </td>
                                <td>{{ $item->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">  
                    <form method="POST" action="{{ route('cart.checkout') }}">
                        @csrf
                        <div class="d-flex">
                            <div class="input-group flex-nowrap">
                                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                <button class="btn btn-success" type="submit">Checkout</button>
                            </div>
                        </div>
                    </form>                           
                </div>       
            @else
                <div class="d-flex justify-content-center">
                    <h2 class="text-white text-align-center">Your cart is empty!</h2>
                </div> 
            @endif   
        </div>
    </div>

    <script>
        function validateQuantity(form) {
            var quantityInput = form.querySelector('.quantity-input');
            var quantityValue = parseInt(quantityInput.value);

            if (quantityValue < 1) {
                alert('Quantity must be greater than or equal to 1');
                return false; 
            }

            return true;
        }
    </script>

@else
    <div class="alert alert-danger text-center">
        <strong>Please login with a customer role!</strong>
    </div>
    <script>
        setTimeout(function(){
            window.location.href = '/';
        }, 3000); // Redirect after 3 seconds
    </script>
@endif
@endauth
@endsection
