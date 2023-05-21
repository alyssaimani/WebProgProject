@extends('layouts.main')

@section('container')
@if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="d-flex justify-content-center pt-3 pb-3">
    <div class="d-flex flex-column">
            <div class="d-flex justify-content-center">
                <h1 class="text-white text-align-center">Our Products</h1>
            </div>
            <div class="d-flex justify-content-center pb-3">
                @auth
                    @if (auth()->user()->role === "admin")
                        <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
                    @endif
                @endauth
            </div>
            <div class="container"  style="width: 50rem;">
                <div class="row row-gap-4 col-gap-4 row-cols-3">

                    @foreach ($products as $product)
                    
                        <div class="col d-flex justify-content-center">
                            <div class="card">
                                <div style="height: 20rem">
                                    <img src="{{ $product->image }}" style="height: 20rem" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <div style="height: 8rem">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text text-warning">Rp. {{ $product->price }}</p>
                                        <p class="card-text">{{ $product->description }}</p>
                                    </div>
                                    @auth
                                        @if (auth()->user()->role === "admin")
                                            <a href="/product/{{ $product->id }}/edit" class="btn btn-primary">Update</a>
                                            
                                            <form action="/product/{{ $product->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form>
                                        @else
                                            <form action="{{ route('cart.addProductToCart') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                                            </form>
                                        @endif
                                    @endauth

                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $products->links() }}
            </div>
        </div>

        
    </div>
    
@endsection