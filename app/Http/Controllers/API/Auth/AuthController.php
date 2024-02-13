<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Services\User\FCMTokenService;

class AuthController extends Controller
{

    protected $fcmTokenService;
    public function __construct()
    {
        $this->fcmTokenService = new FCMTokenService();
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'code_confirm'=>null])) {
            $user = Auth::user();
            $user->token = $user->createToken('game-traker')->plainTextToken;
            
            $park = $this->fcmTokenService->adminToken($user, $request->token, true);
            if(!$user->is_admin){
                $user->parks[] = $park;
            }
            return response()->json([
                'message'=>'success',
                'data'=>$user
            ], 200);
        }

        return response()->json([
            'message'=>'invalid credentials',
            'data'=>null
        ], 401);
    }

    public function logout(Request $request)
    {
        try {
            $user = Auth::user();
            Auth::user()->tokens()->delete();
            \Log::info('user '.$user);
            $this->fcmTokenService->adminToken($user, $request->token, false);
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
