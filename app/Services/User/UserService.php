<?php

namespace App\Services\User;

use App\Models\User;
use App\Models\Park;

class UserService
{
    public function create(Array $data): User 
    {
        try {
            return User::create($data);
        } catch (\Throwable $th) {
            Log::critical("Error on UserService::create ".$th->getMessage());
        }
    }
}
