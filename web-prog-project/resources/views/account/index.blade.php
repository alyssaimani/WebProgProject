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
                <h1 class="text-white text-align-center">Accounts</h1>
            </div>
            
            <div class="container mt-5"  style="width: 50rem;">
                <div class="row row-gap-4 row-cols-1">
                      
                    @foreach ($users as $user)
                    
                        <div class="col d-flex justify-content-center">
                            <div class="card w-100">
                                <div class="card-body d-flex p-0 ps-2">
                                    <div class="pt-2 w-100">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                        <p class="card-text fw-bold">{{ $user->email }}</p>
                                        <p class="card-text fw-bold text-warning">{{ $user->role }}</p>
                                    </div>
                                    
                                   <div class="d-flex flex-column p-0">
                                     <a href="/account/{{ $user->id }}/edit" class="btn btn-primary d-flex align-items-center" style="height: 4rem; width: 5rem">Update</a>
                                            
                                    <form action="/account/{{ $user->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" style="height: 4rem; width: 5rem" onclick="return confirm('Are you sure you want to delete this account?')">Delete</button>
                                    </form>
                                   </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{-- {{ $products->links() }} --}}
            </div>
        </div>

        
    </div>
    

@endsection