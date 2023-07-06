<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'code_confirm'=>null])) {
                $user = Auth::user();
                $user->token = $user->createToken('game-traker')->plainTextToken;
                return response()->json([
                    'message'=>'success',
                    'data'=>$user
                ], 200);
            }
    
            return response()->json([
                'message'=>'invalid credentials',
                'data'=>null
            ], 401);
        } catch (\Throwable $th) {
            \Log::critical('ERROR login '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		],500);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return response()->json([
                'message'=>'success',
                'data'=>null
            ], 200);
        } catch (\Throwable $th) {
            \Log::critical('ERROR logout '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		],500);
        }
    }
}
