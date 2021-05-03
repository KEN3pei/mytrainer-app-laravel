<?php

namespace App\DataProvider;

use App\DataProvider\Eloquent\TrainingMenuItem;

class TrainingMenuItemRepository implements TrainingMenuItemRepositoryInterface
{
    private $training_menu_item;

    public function __construct(TrainingMenuItem $training_menu_item)
    {
        $this->training_menu_item = $training_menu_item;
    }

    public function search(string $keyword)
    {
        $items = $this->training_menu_item->where('item_name', 'like', "%$keyword%")->get();
        return $items;
    }

    public function getAllItem(){
        $all_item = $this->training_menu_item->get();
        return $all_item;
    }
    
}