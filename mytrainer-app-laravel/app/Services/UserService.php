<?php
namespace App\Services;

use App\DataProvider\UserRepositoryInterface;
use Exception;

class UserService 
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function edit(string $column, string $data)
    {
        $result = $this->user->edit($column, $data);
        return $result;
    }
}