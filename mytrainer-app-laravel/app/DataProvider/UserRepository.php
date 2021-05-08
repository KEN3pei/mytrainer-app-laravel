<?php

namespace App\DataProvider;

use App\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function edit(string $column, string $data){
        try{
            $this->user->find(Auth::user()->id)->fill([$column => $data])->save();
            return true;
        }catch(Exception $e){
            return $e;
        }
    }
}