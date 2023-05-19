@extends('layouts.main')
@section('container')
    
    <div class="d-flex justify-content-center pt-3 pb-3">
    <div class="d-flex flex-column">
            <div class="d-flex justify-content-center">
                <h1 class="text-white text-align-center">Transaction</h1>
            </div>
            
           <table class="table">
            <thead>
                <tr>
                <th scope="col">Transaction ID</th>
                <th scope="col">Transaction Date</th>
                <th scope="col">Username</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">[Transaction ID]</th>
                <td>[Transaction Date]</td>
                <td>[Username]</td>
                <td>[Product Name]</td>
                <td>[Price]</td>
                <td>[Quantity]</td>
                <td>[Total]</td>
                </tr>
                <tr>
                <th scope="row">[Transaction ID]</th>
                <td>[Transaction Date]</td>
                <td>[Username]</td>
                <td>[Product Name]</td>
                <td>[Price]</td>
                <td>[Quantity]</td>
                <td>[Total]</td>
                </tr>
            </tbody>
            </table>

        </div>

        
    </div>

@endsection