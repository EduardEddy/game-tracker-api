<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\Park;
use App\Models\FCMToken;

class FCMTokenRepository
{
    public function create($token, User $user, Park $park)
    {
        FCMToken::create([
            'token' => $token, 
            'is_login' => true, 
            'user_id' => $user->id, 
            'park_id' => $park->id
        ]);
    }

    public function read($token)
    {
        return FCMToken::where('token', $token)->first();
    }

    public function loginToken($isLogin, $token)
    {
        $fcmToken = FCMToken::where('token', $token)->first();
        $fcmToken->update(['is_login' => $isLogin]);
    }
}
