<?php
namespace App\Services;

use App\DataProvider\TrainingMenuItemRepositoryInterface;
 
class TrainingMenuItemService
{
    private $training_menu_item;

    public function __construct(TrainingMenuItemRepositoryInterface $training_menu_item)
    {
        $this->training_menu_item = $training_menu_item;
    }

    public function KeywordToFind($keyword) 
    {
        // 記号、数字は受け付けないようにしたい
        if(!$keyword){
            return null;
        }
        $items = $this->training_menu_item->search($keyword);
        // dd($items);
        $imgUrls = [];
        foreach($items as $item){
            $imgUrls[] = $item->s3_img_url;
        }
        return $imgUrls;
    }
}