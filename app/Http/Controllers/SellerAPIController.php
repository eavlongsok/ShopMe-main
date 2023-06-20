<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SellerAPIController extends Controller
{
    //
    public function getCategories() {
        $categories = DB::table('category')->get();
        if (isset($categories)) {
            return response()->json(['categories' => $categories], 200);
        }
        else {
            return response()->json(['categories' => 'No categories found'], 404);
        }
    }

    public function registerProduct(Request $request) {
        $validation = Validator::make($request->all(), [
            "name" => "required",
            "category" => "required|numeric",
            "condition" => "required|numeric",
            "price" => "required|numeric",
            "quantity" => "required|numeric",
            "description" => "required|max:255",
        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors(), 'dataSent' => $request->all()], 422);
        }

        $seller_id = Auth::guard('seller_token')->user()->seller_id;

        $registerID = DB::table('product')->insertGetId([
            'seller_id' => $seller_id,
            'product_name' => $request->input('name'),
            'category_id' => $request->input('category'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'product_condition' => $request->input('condition'),
            'product_description' => $request->input('description'),
        ]);

        if ($registerID) {
            $listing_request = DB::table('listing_request')->insert([
                'product_id' => $registerID
            ]);

            $image = $request->file('image');
            $client = new Client();
            $response = $client->request('POST', 'https://api.imgur.com/3/image', [
                'headers' => [
                        'authorization' => 'Client-ID ' . env('imgur_client_id'),
                        'content-type' => 'application/x-www-form-urlencoded',
                    ],
                'form_params' => [
                        'image' => base64_encode(file_get_contents($image))
                    ],
                ]);
            $img_link =  json_decode($response->getBody()->getContents())->data->link;

            if (isset($response)) {
                $storeImage = DB::table('product_img')->insert([
                    'product_id' => $registerID,
                    'img_url' => $img_link
                ]);
            }

        if ($registerID && $storeImage) {
            return response()->json(['success' => 'sucessfully inserted'], 200);
        }
        else return response()->json(['failed' => 'failed to insert'], 500);
        }
    }

    public function test(Request $request) {
        // return response()->json(['message' => 'hi']);
        $image = $request->file('image');
        // $imageName = time() . '-' . $image->getClientOriginalName() . '.' . $image->extension();
        $client = new Client();
        $response = $client->request('POST', 'https://api.imgur.com/3/image', [
            'headers' => [
                    'authorization' => 'Client-ID ' . env('imgur_client_id'),
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
            'form_params' => [
                    'image' => base64_encode(file_get_contents($image))
                ],
            ]);
        return json_decode($response->getBody()->getContents())->data->link;
    }

    public function getSellerInfo (Request $request) {
        $seller_id = $request->user()->seller_id;
        $seller = DB::table('seller')->where('seller_id', $seller_id)->first();
        if (isset($seller)) {
            $seller = [
                'seller_id' => $seller->seller_id,
                'first_name' => $seller->first_name,
                'last_name' => $seller->last_name,
                'email' => $seller->email,
                'date_of_birth' => $seller->date_of_birth,
                'created_at' => $seller->created_at,
            ];
            return response()->json($seller, 200);
        }
        else {
            return response()->json(['seller' => 'No seller found'], 404);
        }
    }

    public function verify(Request $request){
        return response()->json($request);
    }
}

