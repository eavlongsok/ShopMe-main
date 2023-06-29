<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function searchProduct(Request $request) {
        $search = $request->input('q');
        $category_id = $request->input('cate');
    }
}
