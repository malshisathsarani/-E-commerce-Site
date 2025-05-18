<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    // index - List all products
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // create - Show create form
    public function create() {
        return view('products.create');
    }

    // store - Save product
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.index');
    }

    // edit - edit form
    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    // update - Update product
    public function update(Request $request, Product $product) {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index');
    }

    // destroy - Delete product
    public function destroy(Product $product) {
        $product->delete();
        return redirect()->route('products.index');
    }


}
