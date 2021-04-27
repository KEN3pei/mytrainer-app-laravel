<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrainingMenuItemService;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Services\SearchPagination;

class SearchController extends Controller
{
    private $training_menu_items;

    public function __construct(TrainingMenuItemService $training_menu_items)
    {
        $this->training_menu_items = $training_menu_items;
    }

    public function index() {
        $S3 = app()->make('s3');
        $s3imgUrls = $S3->getAllObject();
        return view('search', ['s3imgUrls' => $s3imgUrls]);
    }

    public function search(Request $request) {
        $keyword = $request->input('keyWord');
        $imgUrls = $this->training_menu_items->KeywordToFind($keyword);
        
        $url = $request->url();
        $_token = $request->query("_token");
        $keyWord = $request->query("keyWord");
        $now_url = $url . "?_token=" . $_token . "&keyWord=" . $keyWord;
        // 1 -> 0 ~ 3
        // 2 -> 3 ~ 6
        // 3 -> 6 ~ 9
        // 4 -> 9 ~ 12
        $display_limit = 3;
        $arrayOfNum = (((int)$request->page) - 1) * $display_limit;
        $result = array_slice( $imgUrls, $arrayOfNum, $display_limit);
        // dd($result);
        // dd($request->page);
        $userPaginate = new LengthAwarePaginator(
            $result, // 現在のページのsliceした情報(items)
            count($imgUrls), // 総件数（total）１ページに表示される数
            $display_limit, // perPage
            $request->page, // 現在のページ(ページャーの色がActiveになる)（currentPage）
            ['path' => $now_url] // ページャーのリンクをOptionのpathで指定
        );
        // dd($userPaginate->links());


        return view('search', ['imgUrls' => $userPaginate]);
    }
}