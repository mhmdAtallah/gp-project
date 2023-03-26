<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Attribute;
use Database\Factories\ProductFactory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        return view('products', ['products' => Product::orderBy('created_at', 'DESC')->paginate(8)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $credentials = $req->validate([
            "title" => ['required', 'min:3', 'max:254'],
            "price" => ['required', 'min:3', 'max:254'],
            "quantity" => ['required', 'min:3', 'max:254'],
            "description" => ['required', 'min:0'],
        ]);


        Product::create($credentials);

        redirect('/products')->with('success', "product added successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

        return view('product.show', ['product' => Product::where('id', $product->id)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Product $product)
    {
        $credentials = $req->validate([
            "title" => ['required', 'min:3', 'max:254'],
            "price" => ['required'],
            "quantity" => [
                'required',
            ],
            "description" => ['required', 'min:0'],
        ]);

        $product->update($credentials);
        return redirect("/product/" . $product->id)->with('success', "product updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}