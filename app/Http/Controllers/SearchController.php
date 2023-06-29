<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    //
    public function searchProduct(Request $request) {

        $query = $request->q;
        $category_id = $request->category_id;
        if ($request->has('page')) $page = $request->page;
        else $page = 1;

        if ($request->has('limit')) $limit = $request->limit;
        else $limit = 10;

        if ($category_id === 0) {
            $result = Product::search($query)->where('is_approved', 1)->paginate($limit, 'page', $page);
        }

        else {
            $result =  Product::search($query)->where('category_id', $category_id)->where('is_approved', 1)->paginate($limit, 'page', $page);
            return response()->json($result);
        }

        $result = $result->items();
        if (count($result) === 0) {
            return response()->json(['products' => []]);
        }


    }

    // for web.php
    public function searchPage(Request $request) {
        $validator = Validator::make($request->all(), [
            'q' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('/');
        }

        return view('buyer');
    }
}
