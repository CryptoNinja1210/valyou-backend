<?php

namespace App\Http\Controllers\API;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function __construct(){

    }
    public function login(Request $request) {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
                [
                    'email' => 'required',
                    'password' => 'required'
                ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['email', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Email & Password does not exist.',
                ], 401);
            }

            $user = User::where('email', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Logged In Successfully',
                'token' => $user->createToken('AppName')->accessToken
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
        // $credentials = [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];

        // if( auth()->attempt($credentials) ) {
        //     $user = Auth::user();
        //     $success['token'] =  $user->createToken('AppName')->accessToken;
        //     return response()->json(['success' => $success], 200);
        // } else {
        //     return response()->json(['error'=>'Unauthorised'], 401);
        // }
    }

    public function register(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(),
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
                'country' => ['required','string'],
                'avatar' => ['required', 'string'],
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken('AppName')->accessToken
            ], 200);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function reset(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6']
        ]);

        if ( $validator->fails()) {
            return response()->json([ 'error' => $validator->errors() ]);
        }

        $data = $request->all();
        if ( !User::where('email', $data['email'])->exists() ){
            return response()->json([ 'error' => 'User not found!']);
        }
        $user = User::where('email', $data['email'])->first();
        $user->password = Hash::make($data['password']);
        return response()->json(['success' => $user->update()], 200);
    }
}

