<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function signUp(Request $request) {
        $userType = $request->input('userType');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        $remember = $request->input('remember');

        if ($userType === 1) {
            $validation = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:buyer',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|min:8|same:password',
            ]);
            if ($validation->fails()) {
                return response()->json(['errors' => $validation->errors()], 422);
            }

            $buyer = new Buyer();
            $buyer->first_name = $firstName;
            $buyer->last_name = $lastName;
            $buyer->email = $email;
            $buyer->password = Hash::make($password);
            $buyer->date_of_birth = "2000-01-01";
            $buyer->save();
        }
        else if ($userType === 2) {
            $validation = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:seller',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|min:8|same:password',
            ]);
            if ($validation->fails()) {
                return response()->json(['errors' => $validation->errors()], 422);
            }

            $seller = new Seller();
            $seller->first_name = $firstName;
            $seller->last_name = $lastName;
            $seller->email = $email;
            $seller->password = Hash::make($password);
            $seller->date_of_birth = "2000-01-01";
            $seller->save();
        }
    }

    public function logIn(Request $request) {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json(['errors' => $validation->errors()], 422);
        }

        $userType = $request->input('userType');
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if ($userType === 1) {
            $buyer = Buyer::where('email', $email)->first();
            if (!isset($buyer)) {
                return response()->json(['errors' => ['message' => 'User Not Found']], 404);
            }

            if (Auth::guard('buyer') -> attempt(['email' => $email, 'password' => $password], $remember)) {
                $request->session()->regenerate();
                return response()->json(['success' => ['message' => 'Login successfully']], 200);
            } else {
                return response()->json(['errors' => ['message' => 'Email and password were not matched']], 401);
            }
        }

        if ($userType === 2) {
            $seller = Seller::where('email', $email)->first();
            if (!isset($seller)) {
                return response()->json(['errors' => ['message' => 'User Not Found']], 404);
            }
            if (Auth::guard('seller') -> attempt(['email' => $email, 'password' => $password], $remember)) {
                $request->session()->regenerate();
                return response()->json(['success' => ['message' => 'Login successfully']], 200);
            } else {
                return response()->json(['errors' => ['message' => 'Email and password were not matched']], 401);
            }
        }
    }

    public function home() {
        if (auth()->guard('buyer')->check()) {
            return view('buyerhomepage');
        }
        else if (auth()->guard('seller')->check()) {
            return view('sellerhomepage');
        }
    }

    public function logOut() {
        if (auth()->guard('buyer')->check()) {
            auth()->guard('buyer')->logout();
        }
        if (auth()->guard('seller')->check()) {
            auth()->guard('seller')->logout();
        }
    }
}
