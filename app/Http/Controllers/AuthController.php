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
        $dateOfBirth = $request->input('dob');
        $dateOfBirth=date("Y-m-d H:i:s",strtotime($dateOfBirth));
        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        $remember = $request->input('remember');

        if ($userType == 1) {
            $validation = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:buyer,email',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|min:8|same:password',
            ]);
            if ($validation->fails()) {
                return response()->json(['errors' => $validation->errors()], 422);
            }
            $buyer = new Buyer();
            $buyer->first_name = trim($firstName);
            $buyer->last_name = trim($lastName);
            $buyer->email = strtolower(trim($email));
            $buyer->password = Hash::make($password);
            $buyer->date_of_birth = $dateOfBirth;
            $buyer->save();
            $this->logIn($request);

            return response()->json(['success' => ['message' => 'Sign up successfully']], 200);
        }
        else if ($userType == 2) {
            $validation = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:seller,email',
                'password' => 'required|min:8',
                'confirmPassword' => 'required|min:8|same:password',
            ]);
            if ($validation->fails()) {
                return response()->json(['errors' => $validation->errors()], 422);
            }

            $seller = new Seller();
            $seller->first_name = trim($firstName);
            $seller->last_name = trim($lastName);
            $seller->email = strtolower(trim($email));
            $seller->password = Hash::make($password);
            $seller->date_of_birth = $dateOfBirth;
            $seller->save();
            $this->logIn($request);

            return response()->json(['success' => ['message' => 'Sign up successfully']], 200);
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
        $email = trim($request->input('email'));
        $password = $request->input('password');
        $remember = $request->input('remember');

        // return response()->json(['userType' => $userType, 'email' => $email, 'password' => $password, 'remember' => $remember], 200);

        if ($userType == 1) {
            $buyer = Buyer::where('email', $email)->first();
            if (!isset($buyer)) {
                return response()->json(['errors' => ['message' => 'User Not Found']], 404);
            }

            if (Auth::guard('buyer') -> attempt(['email' => $email, 'password' => $password], $remember)) {
                $buyer = Buyer::where('email', $email)->first();
                if ($buyer->status == 0) {
                    return response()->json(['errors' => ['message' => 'Your account is banned']], 403); // 403: Forbidden
                }
                $token = $buyer->createToken(time())->plainTextToken;
                $buyer->api_token = $token;
                $buyer->save();
                $request->session()->regenerate();
                return response()->json(['success' => ['message' => 'Login successfully'], 'token' => $token], 200);
            } else {
                return response()->json(['errors' => ['unmatched' => 'Email and password were not matched']], 401);
            }
        }

        if ($userType == 2) {
            $seller = Seller::where('email', $email)->first();
            if ($seller->status == 0) {
                return response()->json(['errors' => ['message' => 'Your account is banned']], 403); // 403: Forbidden
            }
            if (!isset($seller)) {
                return response()->json(['errors' => ['message' => 'User Not Found']], 404);
            }
            if (Auth::guard('seller') -> attempt(['email' => $email, 'password' => $password], $remember)) {
                $seller = Seller::where('email', $email)->first();
                $token = $seller->createToken(time())->plainTextToken;
                $seller->api_token = $token;
                $seller->save();
                $request->session()->regenerate();
            return response()->json(['success' => ['message' => 'Login successfully'], 'token' => $token], 200);
            } else {
                return response()->json(['errors' => ['unmatched' => 'Email and password were not matched']], 401);
            }
        }
    }

    public function home() {
        if (auth()->guard('buyer')->check()) {
            return view('buyer');
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
