<?php

namespace App\Services\User;

use App\Models\User;
use App\Models\CollaboratorPark;

use App\Repositories\User\FCMTokenRepository;
use App\Helpers\HandleErrorResponse;

class FCMTokenService 
{
    protected $fcmTokenRepository;
    protected $handleError;
    public function __construct()
    {
        $this->fcmTokenRepository = new FCMTokenRepository();
        $this->handleError = new HandleErrorResponse();
    }

    public function adminToken(User $user, $token, $isLogin)
    {
        try {
            if ($user->is_admin) {
                $this->handleLogin($token, $user, $user->parks->first(), $isLogin);
            } else {
                $collaboratorPark = CollaboratorPark::where('user_id', $user->id)->first();
                $this->handleLogin($token, $user, $collaboratorPark->Park, $isLogin);
                return $collaboratorPark->Park;
            }
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on MFC::Tokens::adminToken ".$th->getMessage());
        }
    }

    private function handleLogin($token, $user, $park, $isLogin)
    {
        if ($this->fcmTokenRepository->read($token)) {
            $this->fcmTokenRepository->loginToken($isLogin, $token);
        } else {
            $this->fcmTokenRepository->create($token, $user, $park);
        }
    }
}
