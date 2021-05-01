<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    public function index() {
        return view('top');
    }

    public function createList(Request $request){
        dd($request->input('listName'));
        return view('top');
    }
}