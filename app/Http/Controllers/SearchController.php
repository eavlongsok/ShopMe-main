<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        if ($category_id == 0) {
            $result = Product::search($query)->where('is_approved', 1)->paginate($limit, 'page', $page);
        }

        else {
            $result =  Product::search($query)->where('category_id', $category_id)->where('is_approved', 1)->paginate($limit, 'page', $page);
            // return response()->json($result);
        }

        $result = $result->items();
        $products = [];
        foreach($result as $product) {
            $_product = DB::table('product')->join('product_img', 'product_img.product_id', '=', 'product.product_id')->where('product.product_id', $product->product_id)->where('product.is_approved', 1)->whereNull('product.banned_by')->select('product.*', 'product_img.img_url')->first();
            array_push($products, $_product);
        }

        return response()->json(['products' => $products]);
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

    public function getProductInfo(Request $request, $id) {
        $product = DB::table('product')->join('product_img', 'product_img.product_id', 'product.product_id')->where('product.product_id', $id)->where('product.is_approved', 1)->whereNull('product.banned_by')->select('product.*', 'product_img.img_url')->first();

        return response()->json(['product' => $product]);
    }
}
