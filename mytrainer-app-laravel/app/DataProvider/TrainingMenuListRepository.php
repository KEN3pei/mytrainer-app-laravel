<?php

namespace App\DataProvider;

use App\DataProvider\Eloquent\TrainingMenuList;
use Exception;

class TrainingMenuListRepository implements TrainingMenuListRepositoryInterface
{
    private $training_menu_List;

    public function __construct(TrainingMenuList $training_menu_List)
    {
        $this->training_menu_List = $training_menu_List;
    } 

    public function getList(int $id){
        $lists = $this->training_menu_List->where('user_id', $id)->get();
        return $lists;
    }

    public function create($list_name, $user_id)
    {
        $this->training_menu_List->insert([
            'list_name' => $list_name,
            'user_id' => $user_id
        ]);
        return;
    }

    public function existCheckName($list_name)
    {
        $result = $this->training_menu_List->where('list_name', $list_name)->exists();
        return $result;
    }

    public function getListId($list_name, int $user_id)
    {
        $list_id = $this->training_menu_List->where('list_name', $list_name)->where('user_id', $user_id)->get('list_id')->toArray();
        return $list_id[0]['list_id'];
    }

    public function getItemImages(int $id)
    {
        $name_urls = $this->training_menu_List->find($id)->trainingMenuItems()->get(['item_name', 's3_img_url']);
        return $name_urls;
    }

    public function delete(int $id)
    {
        try{
            $this->training_menu_List->find($id)->trainingMenuItems()->detach();
            $this->training_menu_List->where('list_id', $id)->delete();
            return true;
        }catch(Exception $e){
            return $e;
        }       
    }
}