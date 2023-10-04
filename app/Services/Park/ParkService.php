<?php

namespace App\Services\Park;

use App\Models\User;
use App\Models\Park;

class ParkService
{
    public function create(User $user, String $park_name)
    {
        try {
            return Park::create([
                'park_name'=>$park_name,
                'user_id' => $user->id
            ]);
        } catch (\Throwable $th) {
            Log::critical("Error on ParkService::create ".$th->getMessage());
        }
    }
}
