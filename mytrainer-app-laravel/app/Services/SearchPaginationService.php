<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchPaginationService
{
    public function processRequestAndPagination(Request $request, $array) 
    {
        $url = $request->url();
        $_token = $request->query("_token");
        $keyWord = $request->query("keyWord");
        $now_url = $url . "?_token=" . $_token . "&keyWord=" . $keyWord;
        $display_limit = 3;
        $arrayOfNum = ((int)($request->page ?? 1) - 1) * $display_limit;
        $result = array_slice( $array, $arrayOfNum, $display_limit);

        $itemPaginate = $this->pagination(
            $result,        // 現在のページのsliceした情報(items)
            $array,         // 総件数（total）１ページに表示される数
            $display_limit, // perPage
            $request->page, // 現在のページ(ページャーの色がActiveになる)（currentPage）
            $now_url        // ページャーのリンクをOptionのpathで指定
        );
        return $itemPaginate;
    }

    public function pagination($sliced_items , $all_items, $display_limit_num, $currentPage, $url) 
    {
        $itemPaginate = new LengthAwarePaginator(
            $sliced_items, // 現在のページのsliceした情報(items)
            count($all_items), // 総件数（total）１ページに表示される数
            $display_limit_num, // perPage
            $currentPage, // 現在のページ(ページャーの色がActiveになる)（currentPage）
            ['path' => $url] // ページャーのリンクをOptionのpathで指定
        );
        return $itemPaginate;
    }
}