<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function login()
    {
        
        $user['email'] =Session::get('email');
        $user['password'] = Session::get('email');
        
        return view(
            'user/login', [
                'user' => $user
            ]
        );
    }

    public function wallet(){
        return view('user/wallet');
    }

    public function recharge(Request $request){
        $user = user::find(Auth::user()->id);
        $user->wallet = $user->wallet + $request['value'];
        if($user->wallet > 50000){
            $user->wallet = 50000;
        }

        $user->save();

        return redirect(route('user.wallet'));
    }

    public function address(){
        return view('user/address');
    }

    public function storeAddress(AddressRequest $request){
        $user = User::find(Auth::user()->id);

        $address = array(
            'address' => $request['address'],
            'state' => $request['state'],
            'postal' => $request['postal'], 
            'country' => $request['country']
        );

        $stringAddress = serialize($address);

        $user->address = $stringAddress;
        $user->save();

        return redirect(route('user.index'));
    }

    public function auth(Request $request)
    {
        if (Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ], false)) {
            return redirect(route('home'));
        }
        Session::put('email', $request['email']);
        Session::put('password', $request['password']);
        
        return redirect(route('user.login'));
    }

    public function loggout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('user/singin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new user;
        $user->name = $request['name'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->level = 1;
        $user->wallet = 500;
        $user->cart = 0;
        $user->username = $request['name'].'#'.random_int(1000, 9999);
        $user->birthdate = new \DateTime($request->date);

        $user->save();

        return redirect(route('user.login'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if(Auth::user()->address != NULL){
            $address = unserialize(Auth::user()->address);
        }else{
            $address = null;
        }

        return view('user/show', [
            'address' => $address,
        ]);
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
