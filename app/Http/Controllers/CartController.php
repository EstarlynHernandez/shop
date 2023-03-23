<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function thanks(int $id)
    {
        $product = Product::find($id);
        $products = Product::where('category_id', $product->category_id)->get()->take(15);

        return view('cart/thanks', [
            'product' => $product,
            'products' => $products,
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::where('user_id', Auth::id())->get();
        $prize = 0;

        if (count($carts) > 0) {
            foreach ($carts as $cart) {
                $prize += $cart->product->prize;
            }
        } else {
            $carts = null;
        }


        $products = Product::all();

        return view('cart/index', [
            'carts' => $carts,
            'prize' => $prize,
            'products' => $products,
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
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = intval($request->product);
        $cart->save();

        $user = User::find(Auth::user()->id);
        $user->cart = Auth::user()->cart + 1;
        $user->save();

        return redirect(route('cart.thanks', $request->product))->with($request->product);
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
        $cart = Cart::find($id);

        if ($cart->user_id == Auth::user()->id) {
            $cart->delete();
            $user = User::find(Auth::user()->id);
            $user->cart = Auth::user()->cart - 1;
            $user->save();
        }


        return redirect(route('cart.index'));
    }
}
