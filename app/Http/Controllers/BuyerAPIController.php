<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BuyerAPIController extends Controller
{
    //
    public function getBuyerInfo(Request $request) {
        $buyer_id = $request->user()->buyer_id;
        $buyer = DB::table('buyer')->where('buyer_id', $buyer_id)->first();
        if (isset($buyer)) {
            $buyer = [
                'buyer_id' => $buyer->buyer_id,
                'first_name' => $buyer->first_name,
                'last_name' => $buyer->last_name,
                'email' => $buyer->email,
                'date_of_birth' => $buyer->date_of_birth,
                'created_at' => $buyer->created_at,
            ];
            return response()->json($buyer, 200);
        }
        else {
            return response()->json(['buyer' => 'No buyer found'], 404);
        }
    }

    public function getProduct(){
        $product = DB::table('product')->join('product_img','product_img.product_id',"=",'product.product_id')->get();
        if(isset($product)){
            return response()->json(['product' => $product], 200);
        }
        else{
            return response()->json(['product' => 'No product found'], 404);
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
}
