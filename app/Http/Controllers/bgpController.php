<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bgpController extends Controller
{
    //
    public function show(){
        return view('bgp');
    }
    public function links(){
        return view('links');
    }
}
