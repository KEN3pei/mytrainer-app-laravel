<?php

namespace App\DataProvider;

interface TrainingMenuListRepositoryInterface 
{
    public function getList(int $id);
    public function create($list_name, $user_id);
    public function existCheckName(string $list_name);
    public function getListId($list_name, int $user_id);
    public function getItemImages(int $id);
}