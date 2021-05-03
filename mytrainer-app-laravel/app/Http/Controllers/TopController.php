<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TrainingMenuItemService;
use App\Services\TrainingMenuListService;
use App\Services\ItemBelongingListService;

class TopController extends Controller
{
    private $training_menu_items;
    private $training_menu_list;
    private $item_belonging_list;

    public function __construct(
        TrainingMenuItemService $training_menu_items, 
        TrainingMenuListService $training_menu_list,
        ItemBelongingListService $item_belonging_list
        )
    {
        $this->training_menu_items = $training_menu_items;
        $this->training_menu_list = $training_menu_list;
        $this->item_belonging_list = $item_belonging_list;
    }

    public function index(Request $request) 
    {
        //FIXME sessionが切れたときAuth::user()がnullになってエラーが出る。
        $lists = $this->training_menu_list->getLists(Auth::user());
        // dd($lists);
        return view('top', ['lists' => $lists]);
    }

    public function createList(Request $request)
    {
        $list_name = $request->input('listName');
        $user_id = Auth::user()->id;
        $this->training_menu_list->createList($list_name, $user_id);
        // dd($user_id);
        return redirect('top');
    }

    public function show(Request $request)
    {
        $lists = $this->training_menu_list->getLists(Auth::user());
        $listname = $request->query('listname');
        // menuNameの存在チェック->false(redirect)
        if(empty($this->training_menu_list->existCheck($listname))){
            return redirect('/top');
        }
        // menuNameのlist_id->item_belonging_list->item_id->url取得
        $user_id = Auth::user()->id;
        $name_urls = $this->training_menu_list->getMenuItems($listname, $user_id);

        // すでに追加済みのメニューの表示を変えるためにFragをつける
        $all_item = $this->training_menu_items->addFragItems($name_urls);
        // dd($all_item);

        return view('showlist', [
            'lists' => $lists, 
            'name_urls' => $name_urls,
            'all_item' => $all_item
            ]);
    }

    public function addItem(Request $request)
    {
        $item_id = $request->item_id;
        $list_name = $request->list_name;
        $user_id = Auth::user()->id;
        $list_id = $this->training_menu_list->getListId($list_name, $user_id);
        // list_idとitem_idでDBにセットする
        $result = $this->item_belonging_list->addItemAndListID($list_id, $item_id);

        return $result;
    }
}