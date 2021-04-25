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
        $imgUrls = $S3->getAllObject();
        return view('search', ['imgUrls' => $imgUrls]);
    }

    public function search(Request $request) {
        $keyword = $request->input('search-keyword');
        $imgUrls = $this->training_menu_items->KeywordToFind($keyword);
        return view('search', ['imgUrls' => $imgUrls]);
    }
}