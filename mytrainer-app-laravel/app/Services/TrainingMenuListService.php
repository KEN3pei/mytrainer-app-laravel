<?php
namespace App\Services;

use App\User;
use App\DataProvider\TrainingMenuListRepositoryInterface;
 
// FIXME リポジトリパターンの実装を検討する
class TrainingMenuListService
{
   private $training_menu_list;

   public function __construct(TrainingMenuListRepositoryInterface $training_menu_list)
   {
       $this->training_menu_list = $training_menu_list;
   }

   public function getLists(User $user)
   {
    //    dd($user->id);
       $lists = $this->training_menu_list->getList($user->id);
       return $lists;
   }

   public function createList($list_name, $user_id)
   {
        $this->training_menu_list->create($list_name, $user_id);
        return;
   }

   public function existCheck($listname)
   {
       $result = $this->training_menu_list->existCheckName($listname);
       return $result;
   }

   public function getMenuItems(string $list_name, int $user_id)
   {
        // list_nameからid取得
        $list_id = $this->getListId($list_name, $user_id);
        // idからitemのimg配列を取得
        $name_urls = $this->training_menu_list->getItemImages($list_id);
        return $name_urls;
   }

   public function getListId($list_name, int $user_id)
   {
        $list_id = $this->training_menu_list->getListId($list_name, $user_id);
        return $list_id;
   }

   public function delete(int $list_id)
   {
        $this->training_menu_list->delete($list_id);
   }
}