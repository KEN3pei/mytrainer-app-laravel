<?php
namespace App\Services;

use App\DataProvider\Eloquent\TrainingMenuItem;
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
        $imgUrls = [];
        foreach($items as $item){
            $imgUrls[] = $item->s3_img_url;
        }
        return $imgUrls;
    }

    public function getAllItem()
    {
        $all_item = $this->training_menu_item->getAllItem();
        return $all_item;
    }

    public function addFragItems(object $user_items)
    {
        $all_item = $this->getAllItem();
        foreach($user_items as $user_item){
            foreach($all_item as $key => $item){
                if($user_item->s3_img_url === $item->s3_img_url){ 
                    $item['frag'] = true;
                    break;
                }
            }
        }
        return $all_item;
    }
}