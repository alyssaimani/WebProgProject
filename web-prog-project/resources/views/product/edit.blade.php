@extends('layouts.main')
@section('container')
<div class="d-flex justify-content-center">
    <div class="card p-5 m-5 d-flex flex-column" style="width: 75%; height: 600px">
        <form action="/product/{{ $product->id }}" method="POST" style="width: 100%"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="d-flex justify-content-center">
                <h2>Update Product Form</h2>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Product Name..." value="{{ old('name', $product->name) }}" autofocus>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Product Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Enter Product Price..." value="{{ old('price', $product->price) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Enter Product Description..." value="{{ old('description', $product->description) }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="type">Product Type</span>
                <select class="form-select" name="type" id="type" aria-label="type">
                    @foreach ($types as $type)
                        @if (old('type', $product->type) == $type)
                        <option value="{{ $type }}" selected>{{ $type }}</option>
                        @else
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="image" placeholder="Upload Product Image" value="{{  old('image', $product->image) }}">
                <label class="input-group-text" for="image">Browse</label>
            </div>
            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('price')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('description')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('type')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            @error('image')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="d-grid">
                <button type="submit" class="btn bg-success text-light mt-5">
                    Update Product
                </button>
            </div>

        </form>
    </div>
</div>
@endsection