<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Type;
use App\Models\Category;
use App\Models\table;

use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $random = null;
        if(count($products) > 1){
            $random = $products->random();
        }
        
        return view('home/index', [
            'categories' => $categories,
            'products' => $products,
            'random' => $random,
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
