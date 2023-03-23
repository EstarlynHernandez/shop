<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
    
        return view('order/index', [
            'orders' => $orders,
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
        return redirect(route('cart.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }

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
                $order->prize = $prize;
                $order->items = count($products);
                
                $product->amount = $product->amount - 1;
                $product->save();
                $order->save();
            }
            $user->cart = 0;
            $user->save();
            
            Mail::to(Auth::user()->email)->send(new TestEmail());

            return redirect(route('order.thanks'));
        }else{
            Session::put('wallet', true);
        }
        
        return redirect(route('cart.index'));
    }

    public function storeOne(Request $request){
        try {
            $product = Product::find($request->product);
        } catch (\Throwable $th) {
            return redirect(URL::previous());
        }
        $user = User::find(Auth::user()->id);
        $number = $user->id.strtolower(substr($user->name, 0, 3)).rand(1000, 9999).date('mdthi-s');

        if($user->wallet >= $product->prize && $product->amount > 0){
            $order = new Order;
            $order->number = $number;
            $order->user_id = $user->id;
            $order->product_id = $product->id;
            $order->prize = $product->prize;
            $order->items = 1;

            $user->wallet = $user->wallet - $product->prize;
            $product->amount = $product->amount - 1;

            $product->save();
            $user->save();
            $order->save();

            return redirect(route('order.thanks'));
        }
        return redirect(URL::previous());
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



