<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $title = 'Welcome !! Please login to proceed further.';
        return view('main.index')->with('title', $title);
    }
}
