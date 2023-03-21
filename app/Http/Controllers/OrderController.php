<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('number')->get();
        

        $number = [];
        foreach($orders as $order){
            $number[$order->number] = $order; 
        }

        return view('order/index', [
            'orders' => $number,
        ]);
    }

    public function thanks(){
        return view('order.thanks');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product = Product::find($request->id);
        $products = Product::all();

        for($i = 0; $i < count($products); $i++){
            $products[$i]->images = explode( "/-img-/", $products[$i]->images);
        }

        $product->images = explode( "/-img-/", $product->images);
        
        return view('order/create', [
            'product' => $product,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $carts = Cart::where('user_id', Auth::id())->get();
        $count = 0;
        $prize = 0;
        $user = User::find(Auth::id());
        
        
        if(count($carts) > 0){
            foreach ($carts as $cart) {
                $products[$count] = Product::where('id', $cart->product_id)->first();
                if($products[$count]->amount < 1){
                    $cart->delete();
                    return redirect(route('cart.index'));
                }
                $prize+=$products[$count]->prize;
                $count+=1;
            };
        }else{
            $products = null;
        }

        if($user->wallet >= $prize){
            $number = $user->id.strtolower(substr($user->name, 0, 3)).rand(1000, 9999).date('mdthi-s');
            foreach($carts as $cart){
                $cart->delete();
            }

            $user->wallet = $user->wallet - $prize;
            foreach ($products as $product ) {
                $order = new Order();
                $order->number = $number;
                $order->user_id = $user->id;
                $order->product_id = $product->id;
                
                $product->amount = $product->amount - 1;
                $product->save();
                $order->save();
            }
            $user->save();
            
            // Mail::to('estarlyn2107@hotmail.com')->send(new TestEmail());

            return redirect(route('order.thanks'));
        }else{
            Session::put('wallet', true);
        }
        
        return redirect(route('cart.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('order/order');
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



