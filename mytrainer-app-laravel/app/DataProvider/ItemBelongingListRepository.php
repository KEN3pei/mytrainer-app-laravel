<?php

namespace App\DataProvider;

use App\DataProvider\Eloquent\ItemBelongingList;

class ItemBelongingListRepository implements ItemBelongingListRepositoryInterface
{
    private $item_belonging_list;

    public function __construct(ItemBelongingList $item_belonging_list)
    {
        $this->item_belonging_list = $item_belonging_list;
    }

    public function addListAndItemId(int $list_id, int $item_id)
    {
        $this->item_belonging_list->create(
            ['list_id' => $list_id, 'item_id' => $item_id]
        );
    }
    
}