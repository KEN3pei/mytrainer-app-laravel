<?php
namespace App\Services;

use App\DataProvider\Eloquent\TrainingMenuList;
 
// FIXME リポジトリパターンの実装を検討する
class TrainingMenuListService
{
    public function getAllListName()
    {
        $lists = TrainingMenuList::all();

        return;
    }
 
}