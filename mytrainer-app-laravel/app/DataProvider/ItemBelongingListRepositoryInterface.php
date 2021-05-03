<?php

namespace App\DataProvider;

interface ItemBelongingListRepositoryInterface 
{
    public function addListAndItemId(int $list_id, int $item_id);
}