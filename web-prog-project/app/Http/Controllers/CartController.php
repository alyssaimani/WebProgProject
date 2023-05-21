<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = request()->query('id');

        $items = Cart::join('products', 'carts.productId', '=', 'products.id')
            ->where('userId', $userId)
            ->where('isComplete', 0)
            ->select('carts.id as cartId', 'products.name as productName', 'products.price as productPrice', 'products.description as productDescription', 'carts.quantity as quantity', 'carts.total as total')
            ->paginate(10);

        return view('cart', [
            'title' => 'My Cart',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => ['required', 'numeric']
        ]);

        $cart = Cart::find($id);
        $product = Cart::join('products', 'carts.productId', '=', 'products.id')
        ->where('carts.id', $id)
        ->select('products.price as productPrice')
        ->first();

        $cart->quantity = $validatedData['quantity'];
        $cart->total = $validatedData['quantity'] * $product->productPrice;
        $cart->save();
        
        return redirect()->route('cart.index', ['id' => $cart->userId])->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->route('cart.index', ['id' => $cart->userId])->with('success', 'Successfully deleted!');
    }

    public function checkout(Request $request)
    {
        $userId = $request->input('id');

        $carts = Cart::where('userId', $userId)
            ->where('isComplete', 0)
            ->get();

        foreach ($carts as $cart) {
            $cart->isComplete = 1;
            $cart->save();

            $transaction = new Transaction();
            $transaction->uuid = Str::uuid();
            $transaction->cartId = $cart->id;
            $transaction->save();
        }

        return redirect()->route('cart.index', ['id' => $userId])->with('success', 'Successfully checked out!');
    }

}
