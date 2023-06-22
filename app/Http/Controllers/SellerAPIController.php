<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Carbon\Carbon;
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

    public function getRegion(){
        $province = DB::table('region')->orderBy('region_name', 'asc')->get();
        if(isset($province)){
            return response()->json(['province' => $province], 200);
        }
        else{
            return response()->json(['province' => 'No province found'], 404);
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

            $img_link = $this->uploadImage($request, 'image');

            if (isset($img_link)) {
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
        $seller = DB::table('seller')->where('seller.seller_id', $seller_id)->first();
        $verification = DB::table('verification')->where('seller_id', $seller_id)->first();

        if (isset($verification)) $verificationRequested = true;
        else $verificationRequested = false;

        if (isset($seller)) {
            $seller = [
                'seller_id' => $seller->seller_id,
                'first_name' => $seller->first_name,
                'last_name' => $seller->last_name,
                'email' => $seller->email,
                'date_of_birth' => $seller->date_of_birth,
                'created_at' => $seller->created_at,
                'verification_requested' => $verificationRequested,
            ];

            if ($verificationRequested) {
                $seller['verification'] = [
                    'ver_id' => $verification->ver_id,
                    'store_name' => $verification->store_name,
                    'business_info' => $verification->business_info,
                    'verified_by' => $verification->verified_by,
                    'verified_at' => $verification->verified_at,
                    'created_at' => $verification->created_at,
                ];
            }

            return response()->json($seller, 200);
        }
        else {
            return response()->json(['seller' => 'No seller found'], 404);
        }
    }

    public function verify(Request $request){
        $validation = Validator::make($request->all(), [
            'business_name' => 'required',
            'building_number' => 'required',
            'street_number' => 'required',
            'city' => 'required',
            // 'province' => 'required',
            'zip_code' => 'required|integer|digits:6',
            'business_info' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'

        ]);
        if($validation->fails()){

            return response()->json(['errors' => $validation->errors()],422);
        }

        $seller_id = $request->user()->seller_id;

        $business_name = trim($request->input('business_name'));
        $building_number = trim($request->input('building_number'));
        $street_number = trim($request->input('street_number'));
        $city = trim($request->input('city'));
        $province = trim($request->input('province'));
        $zip_code = trim($request->input('zip_code'));
        $business_info = trim($request->input('business_info'));
        $logo = $this->uploadImage($request, 'logo');

        // return response()->json(['store_name' => $business_name, 'business_info' => $business_info, 'typeName' => gettype($business_name), 'typeInfo' => gettype($business_info)]);

        $seller = $request->user();
        $seller->img_url = $logo;
        $seller->save();

        $verification = DB::table('verification')->insert([
            'seller_id' => $seller_id,
            'store_name' => $business_name,
            'business_info' => $business_info,
            'created_at' => Carbon::now()
        ]);


        if ($verification) {
            $address = DB::table('address')->insert([
                'seller_id' => $seller_id,
                'region_id' => intval($province),
                'building_number' => $building_number,
                'street_number' => $street_number,
                'city' => $city,
                'zipcode' => $zip_code,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            if ($address) {
                return response()->json(['success', 'successfully request for verification']);
            }
        }

        return response()->json($request);
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

