<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
