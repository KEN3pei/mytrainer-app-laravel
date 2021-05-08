<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TrainingMenuListService;
use App\Services\UserService;
use Illuminate\Support\Facades\Validator;

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
        $column = $request->param;
        $data = $request->$column;
         // emailならvalidationをかける
        if($column === "email"){
            if($this->emailValidate(['email' => $data])){
                return redirect('/setting');
            }
        }

        $result = $this->user->edit($column, $data);
        return redirect('/setting');
    }
    
    public function logout() 
    {
        Auth::logout();
        return redirect('/login');
    }

    public function emailValidate(array $data)
    {
        $validated = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        return $validated->fails();
    }
}