<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    // index
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('backend.product.index', compact('products'));
    }

    // add
    public function create()
    {
        $categories = Category::all();
        return view('backend.product.create', compact('categories'));
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock_status' => 'required|integer',
            // 'available_quantity' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug(substr($request->name, 0, 30), '-', null) . '-' . substr(uniqid(), -5);
        $product->category_id = $request->category_id;
        $product->short_description = $request->short_description;
        $product->description = $request->description;

        // Upload thumbnail
        if ($request->hasfile('thumbnail')) {
            $name = md5(time() . uniqid()) . '.' . $request->thumbnail->extension();
            // Resize the image to 150x150
            $resizedImage = Image::make($request->thumbnail)->fit(150, 150)->save(public_path('uploads/thumbs/' . $name));
            $product->thumbnail = 'uploads/thumbs/' . $name;
        }

        // Upload images
        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $name = md5(time() . uniqid()) . $key . '.' . $file->extension();
                // Resize the image to 750x750
                $resizedImage = Image::make($file)->fit(750, 750)->save(public_path('uploads/products/' . $name));
                $images[] = 'uploads/products/' . $name;
            }
        }
        $product->images = $images;
        $product->regular_price = (int) $request->regular_price;
        $product->sale_price = (int) $request->sale_price;
        $product->stock_status = $request->stock_status;
        // $product->available_quantity = $request->available_quantity;
        $product->available_quantity = 0;
        $product->save();

        $alert = ['alert-type' => 'success', 'message' => 'Product added successfully!'];
        return redirect()->route('product.index')->with($alert);
    }

    // edit
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    // update
    public function update($id, Request $request){
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer|exists:categories,id',
            'regular_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'stock_status' => 'required|integer',
            // 'available_quantity' => 'required|integer',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if($request->has('name')){
            $product->name = $request->name;
            $product->slug = Str::slug(substr($request->name, 0, 30), '-', null) . '-' . substr(uniqid(), -5);
        }
        $product->category_id = $request->category_id;
        $product->regular_price = (int) $request->regular_price;
        $product->sale_price = (int) $request->sale_price;
        $product->stock_status = $request->stock_status;
        // $product->available_quantity = $request->available_quantity;
        $product->available_quantity = 0;
        $product->short_description = $request->short_description;
        $product->description = $request->description;


        // Upload thumbnail
        if ($request->hasfile('thumbnail')) {
            $name = md5(time() . uniqid()) . '.' . $request->thumbnail->extension();
            // Resize the image to 150x150
            $resizedImage = Image::make($request->thumbnail)->fit(150, 150)->save(public_path('uploads/thumbs/' . $name));
            $product->thumbnail = 'uploads/thumbs/' . $name;
        }

        // Upload images
        $images = [];
        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $name = md5(time() . uniqid()) . $key . '.' . $file->extension();
                // Resize the image to 750x750
                $resizedImage = Image::make($file)->fit(750, 750)->save(public_path('uploads/products/' . $name));
                $images[] = 'uploads/products/' . $name;
            }
            $product->images = $images;
        }
        
        $product->save();

        $alert = ['alert-type' => 'success', 'message' => 'Product updated successfully!'];
        return redirect()->route('product.index')->with($alert);

    }
}
