<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TrainingMenuListService;

class SettingController extends Controller
{
    private $training_menu_list;

    public function __construct(TrainingMenuListService $training_menu_list)
    {
        $this->training_menu_list = $training_menu_list;
    }

    public function index() 
    {
        $lists = $this->training_menu_list->getLists(Auth::user());
        return view('setting', ['lists' => $lists]);
    }
    
    public function logout() 
    {
        Auth::logout();
        return redirect('/login');
    }
}