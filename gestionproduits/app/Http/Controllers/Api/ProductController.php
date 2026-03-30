<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|string',
            'price' => 'required|decimal',
            'stock' => 'required|integer'
        ]);
        // recupère les informations dans la variable request , dans la fonction create
        $product = Product::create($request-> all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Product::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required|string',
            'price' => 'required|decimal',
            'stock' => 'required|integer',
        ]);
        $product = Product::findOrFail($id);
        $product -> update($request -> all());
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id) -> delete();
        return response()->json(null, 204);
    }
}
