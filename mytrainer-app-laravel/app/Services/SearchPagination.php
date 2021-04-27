<?php
namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

class SearchPagination
{
    // protected $request; 
    // public function __construct()
    // {
    //     // $this->request =
    // }
    public function getpaginator($list , $all_num, $disp_limit, $page, $url) {
        $players = new LengthAwarePaginator($list , $all_num, $disp_limit, $page, array('path'=>$url));
        return $players;
    }
}