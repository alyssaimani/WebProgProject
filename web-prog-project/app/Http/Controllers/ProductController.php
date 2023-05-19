<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = Product::where('name', 'LIKE', '%'.$searchTerm.'%')
        ->orWhere('description', 'LIKE', '%'.$searchTerm.'%')
        ->paginate(3);

        return view('product/index', [
            'title' => 'View Products',
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ['Book', 'Stationary'];
        return view('product/create', [
            'title' => 'Add Product',
            'types' => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|min:5',
            'type' => 'required|in:Book,Stationary',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:15000'
        ]);

        $imageFile = $request->file('image');
        $imageDir = 'images/products/';
        $imageName = $imageFile->getClientOriginalName();
        $imagePath = $imageDir . $imageName;
        $imageFile->move($imageDir, $imageName);

        $validatedData['image'] = $imagePath;
        Product::create($validatedData);
        return redirect('product')->with('success', 'New product successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $types = ['Book', 'Stationary'];
    
        return view('product/edit', [
            'product' => $product,
            'title' => 'Update Product',
            'types' => $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5',
            'price' => 'required|numeric|min:1000',
            'description' => 'required|min:5',
            'type' => 'required|in:Book,Stationary',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:15000'
        ]);

        $imageFile = $request->file('image');
        $imageDir = 'images/products/';
        $imageName = $imageFile->getClientOriginalName();
        $imagePath = $imageDir . $imageName;
        $imageFile->move($imageDir, $imageName);

        $validatedData['image'] = $imagePath;
        Product::where('id', $id)
            ->update($validatedData);
        return redirect('product')->with('success', 'Product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('product')->with('success', 'Product has been deleted!');
    }
}
