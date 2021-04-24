<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index() {
        $S3 = app()->make('s3');
        $objectNames = $S3->getAllObject();
        return view('search', ['imgUrls' => $objectNames]);
    }
}