@extends('layouts.main')
@section('container')
@auth
@if (auth()->user()->role === "admin")
<div class="d-flex justify-content-center">
    <div class="card p-5 m-5 d-flex flex-column" style="width: 75%; height: 600px">
        <form action="/account/{{ $user->id }}" method="POST" style="width: 100%"  enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="d-flex justify-content-center">
                <h2>Update Account Form</h2>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" autofocus>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $user->email) }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Input your password">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="role">User Role</span>
                <select class="form-select" name="role" id="role" aria-label="role">
                    @foreach ($roles as $role)
                        @if (old('role', $user->role) == $role)
                        <option value="{{ $role }}" selected>{{ $role }}</option>
                        @else
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endif
                    @endforeach
                </select>
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
            @error('role')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <div class="d-grid">
                <button type="submit" class="btn bg-success text-light mt-5">
                    Update Account
                </button>
            </div>

        </form>
    </div>
</div>
@else
    <div class="alert alert-danger text-center">
        <strong>Access Denied!</strong> You are not authorized to view this page.
    </div>
    <script>
        setTimeout(function(){
            window.location.href = '/';
        }, 3000); // Redirect after 3 seconds
    </script>
@endif
@endauth

@endsection