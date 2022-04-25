<?php

namespace App\DataProvider;

use App\DataProvider\Eloquent\TrainingMenuItem;

class TrainingMenuItemRepository implements TrainingMenuItemRepositoryInterface
{
    private $training_menu_item;

    /**
     * Undocumented function
     *
     * @param TrainingMenuItem $training_menu_item
     */
    public function __construct(TrainingMenuItem $training_menu_item)
    {
        $this->training_menu_item = $training_menu_item;
    }

    /**
     * Undocumented function
     *
     * @param string $keyword
     * @return void
     */
    public function search(string $keyword)
    {
        $items = $this->training_menu_item->newQuery()->where('item_name', 'like', "%$keyword%")->get();
        return $items;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function getAllItem(){
        $all_item = $this->training_menu_item->get();
        return $all_item;
    }
    
}