<?php
namespace App\Services;

use App\DataProvider\Eloquent\TrainingMenuList;
 
class TrainingMenuListService
{
    public function getAllListName()
    {
        $lists = TrainingMenuList::all();

        return;
    }
 
}