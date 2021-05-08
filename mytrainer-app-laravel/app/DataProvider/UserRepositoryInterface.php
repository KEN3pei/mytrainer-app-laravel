<?php

namespace App\DataProvider;

interface UserRepositoryInterface
{
    public function edit(string $column, string $data);
}