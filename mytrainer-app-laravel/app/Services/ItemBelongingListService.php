<?php

namespace App\Services;

use App\DataProvider\ItemBelongingListRepositoryInterface;
use Exception;

class ItemBelongingListService
{
    private $item_belonging_list;

    public function __construct(ItemBelongingListRepositoryInterface $item_belonging_list)
    {
        $this->item_belonging_list = $item_belonging_list;
    }

    public function addItemAndListID(int $list_id, int $item_id)
    {
        try{
            $this->item_belonging_list->addListAndItemId($list_id, $item_id);
            return 'true';
        }catch(Exception $e){
            return $e;
        }
    }
}