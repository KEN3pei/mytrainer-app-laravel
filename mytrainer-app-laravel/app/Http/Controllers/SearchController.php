<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TrainingMenuItemService;

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
        
        $paginator = app()->make('paginator');
        $itemPaginate = $paginator->processRequestAndPagination($request, $imgUrls);
        // dd($itemPaginate);

        return view('search', ['imgUrls' => $itemPaginate]);
    }
}