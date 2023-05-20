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
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->uuid }}</td>
                        <td>{{ $transaction->transactionDate }}</td>
                        <td>{{ $transaction->username }}</td>
                        <td>{{ $transaction->productName }}</td>
                        <td>{{ $transaction->productPrice }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->total }}</td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            {{ $transactions->links() }}
        </div>

        
    </div>

@endsection