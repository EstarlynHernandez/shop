<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;
use App\Models\Message;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function questions()
    {
        return view('support/questions');
    } 
    
    public function privacy()
    {
        return view('support/privacy');
    }

    public function contact(){
        return view('support/contact');
    }

    public function store(MessageRequest $request){
        $message = New Message;

        $message->email = $request->email;
        $message->name = $request->name;
        $message->message = $request->message;

        $message->save();

        return redirect(route('home'));
    }
}
