<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\TrainingMenuItemService;
use App\Services\TrainingMenuListService;

class SearchController extends Controller
{
    private $training_menu_items;
    private $training_menu_list;

    public function __construct(TrainingMenuItemService $training_menu_items, TrainingMenuListService $training_menu_list)
    {
        $this->training_menu_items = $training_menu_items;
        $this->training_menu_list = $training_menu_list;
    }

    public function index() 
    {
        $lists = $this->training_menu_list->getLists(Auth::user());
        $S3 = app()->make('s3');
        $s3imgUrls = $S3->getAllObject();

        return view('search', ['s3imgUrls' => $s3imgUrls, 'lists' => $lists]);
    }

    public function search(Request $request) 
    {
        $lists = $this->training_menu_list->getLists(Auth::user());
        $url = $request->url();
        $_token = $request->query("_token");
        $keyWord = $request->input('keyWord');
        $page = $request->page;

        $imgUrls = $this->training_menu_items->KeywordToFind($keyWord);

        if(empty($keyWord)){
            return redirect('/search');
        }else{
            $paginator = app()->make('paginator');
            $itemPaginate = $paginator->processRequestAndPagination($url, $_token, $keyWord, $page, $imgUrls);
        }

        return view('search', ['imgUrls' => $itemPaginate, 'lists' => $lists]);
    }
}