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
        $items = TrainingMenuItem::where('item_name', 'like', "%$keyword%")->get();
        // dd($items);
        $imgUrls = [];
        foreach($items as $item){
            $imgUrls[] = $item->s3_img_url;
        }
        return $imgUrls;
    }
}