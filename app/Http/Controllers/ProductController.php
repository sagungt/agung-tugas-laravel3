<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        $products = Product::query()->get();
        return view('product.list', ['products' => $products]);
    }

    public function store() {
        return view('product.store');
    }

    public function create(Request $request) {
        $payload = [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
        ];
        $photo = $request->file('photo');
        $photo->storeAs('images', $photo->hashName());
        $path = $request->getSchemeAndHttpHost() . '/storage/images/' . $photo->hashName();
        $payload['photo'] = $path;
        Product::create($payload);
        return redirect()->back()->with(['message' => 'Product created']);
    }

    public function detail($id) {
        $product = Product::query()->where('id', $id)->first();
        return view('product.detail', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $product = Product::query()
            ->where('id', $id)
            ->first();

        $input = $request->all();
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('images', $photo->hashName());
            $newPath = $request->getSchemeAndHttpHost() . '/storage/images/' . $photo->hashName();
            $input['photo'] = $newPath;
            $file = str_replace($request->getSchemeAndHttpHost() . '/storage', '', $product->photo);
            Storage::delete($file);
        }
        $filtered = array_intersect_key($input, array_flip(['name', 'price', 'is_sold', 'photo', 'description']));
        
        $product->fill($filtered);
        $product->save();

        return redirect()->back()->with(['message' => 'Product updated']);
    }

    public function destroy($id, Request $request) {
        $product = Product::query()
            ->where('id', $id)
            ->first();

        $photo = $product->photo;
        $file = str_replace($request->getSchemeAndHttpHost() . '/storage', '', $photo);
        Storage::delete($file);

        $product->delete();

        return redirect()->back()->with(['message' => 'Product deleted']);
    }
}
