<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index() {
        return view('setting');
    }
    
    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}