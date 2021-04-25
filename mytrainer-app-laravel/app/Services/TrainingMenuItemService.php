<?php
namespace App\Services;

use App\DataProvider\Eloquent\TrainingMenuItem;
 
class TrainingMenuItemService
{
    public function KeywordToFind($keyword) 
    {
        // 記号、数字は受け付けないようにしたい
        if(!$keyword){
            return null;
        }
        $items = \App\DataProvider\Eloquent\TrainingMenuItem::where('item_name', 'like', "%$keyword%")->get();
        $imgUrls = [];
        foreach($items as $item){
            $imgUrls[] = $item->s3_img_url;
        }
        return $imgUrls;
    }
}