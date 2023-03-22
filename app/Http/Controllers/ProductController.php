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
        return view('products', ['products' => Product::orderBy('created_at', 'DESC')->paginate(9)]);
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
    public function store(Request $request)
    {
        Product::create(["title" => $request->title, "price" => $request->price, "quantity" => $request->quantity, "description" => $request->description]);

        return redirect('/products');

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
    public function update(Request $request, Product $product)
    {

        $product->update(["title" => $request->title, "price" => $request->price, "quantity" => $request->quantity, "description" => $request->description]);
        return redirect("/product/" . $product->id);
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