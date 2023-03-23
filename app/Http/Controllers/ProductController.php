<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{


    public function search(Request $request){

        $categories = Category::all();
        if(isset($request['category']) && is_numeric($request['category'])){
            $products = Product::search($request['search'])->where('category_id', $request['category'])->paginate(30);
        }else{
            $products = Product::search($request['search'])->paginate(30);
        }

        return view('product/search', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        $newProducts = Product::orderBy('created_at')->get()->take(60);
        $categories = Category::all();
        return view('product/index', [
            'products' => $products,
            'new' => $newProducts,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        try {
            $product = Product::where('name', $request['product'])->first();
            $products = Product::all();
        } catch (\Throwable $e) {
            return redirect('/home');
        }
        
        return view(
            'product/show',
            [
                'product' => $product,
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
