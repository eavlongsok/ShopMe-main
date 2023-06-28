<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BuyerAPIController extends Controller
{
    //
    public function getBuyerInfo(Request $request) {
        $buyer_id = $request->user()->buyer_id;
        $buyer = DB::table('buyer')->where('buyer_id', $buyer_id)->take(1)->get(['buyer_id', 'first_name', 'last_name', 'email', 'date_of_birth', 'created_at', 'img_url']);
        $buyer = $buyer[0];
        // if (isset($buyer)) {
        //     $buyer = [
        //         'buyer_id' => $buyer->buyer_id,
        //         'first_name' => $buyer->first_name,
        //         'last_name' => $buyer->last_name,
        //         'email' => $buyer->email,
        //         'date_of_birth' => $buyer->date_of_birth,
        //         'created_at' => $buyer->created_at,
        //         'img_url'
        //     ];
            return response()->json($buyer, 200);
    }

    public function getProducts(Request $request){
        $category_id = $request->category;
        $product = DB::table('product')->join('product_img','product_img.product_id',"=",'product.product_id')->where('product.category_id', $category_id)->get();
        $category_name = DB::table('category')->where('category_id', $category_id)->first()->category_name;
        // $category_name = $category_name[0];

        if(isset($product)){
            return response()->json(['products' => $product, 'category_name' => $category_name], 200);
        }
        else{
            return response()->json(['products' => 'No product found'], 404);
        }
    }

    public function editAccount(Request $request) {
        $buyer = $request->user();
        $email = $request->input('email');
        $password = $request->input('password');

        if ($email == $buyer->email) {
            $rules = [
                'password' => 'required|min:8',
                'confirmPassword' => 'same:password',
            ];
        }

        else {
            if (isset($password)) {
                $rules = [
                    'email' => 'required|email|unique:buyer,email',
                    'password' => 'required|min:8',
                    'confirmPassword' => 'same:password',
                ];
            }
            else {
                $rules = [
                    'email' => 'required|email|unique:buyer,email',
                ];
            }
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $buyer->email = $email;
        if (isset($password)) {
            if (Hash::check($password, $buyer->password)) {
                return response()->json(['errors' => ['password' => ['password cannot be the same as the old one']]], 422);
            }
            else {
                $buyer->password = Hash::make($password);
            }
        }
        $buyer->save();

        return response()->json(['success' => 'successfully updated'], 200);
    }

    public function editLogo(Request $request) {
        $buyer = $request->user();

        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $logo = $this->uploadImage($request, 'logo');

        if (empty($logo)) {
            return response()->json(['errors' => ['logo' => ['failed to upload logo']]], 500);
        }

        $buyer->img_url = $logo;
        $buyer->save();

        return response()->json(['success' => 'successfully updated', 'img_url' => $logo], 200);
    }

    public function uploadImage(Request $request, $name) {
        $image = $request->file($name);
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
}
