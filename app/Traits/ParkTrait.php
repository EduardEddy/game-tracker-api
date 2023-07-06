<?php

namespace App\Traits;

use App\Models\User;
use App\Models\Park;

trait ParkTrait {
    public function storePark($park, User $user)
    {
        Park::create([
            'park_name'=>$park,
            'user_id' => $user->id
        ]);
    }
}