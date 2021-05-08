<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TrainingMenuListService;
use App\Services\UserService;

class SettingController extends Controller
{
    private $training_menu_list;
    private $user;

    public function __construct(TrainingMenuListService $training_menu_list, UserService $user)
    {
        $this->training_menu_list = $training_menu_list;
        $this->user = $user;
    }

    public function index() 
    {
        $lists = $this->training_menu_list->getLists(Auth::user());
        return view('setting', ['lists' => $lists]);
    }

    public function edit(Request $request)
    {
         //FIXME emailならvalidationをかける
        // if($column === "email"){
        //     varidation();
        // }
        $column = $request->param;
        $data = $request->$column;

        $result = $this->user->edit($column, $data);
        return redirect('/setting');
    }
    
    public function logout() 
    {
        Auth::logout();
        return redirect('/login');
    }
}