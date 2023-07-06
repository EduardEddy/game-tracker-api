<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Park;

class HandlePark
{
    public function createPark(User $user, String $name) 
    {
        try {
            return Park::create([
                'name'=>$name,
                'user_id'=>$user->id
            ]);
        } catch (\Throwable $th) {
            \Log::critical("ERROR HandlePark ".$th->getMessage().' '.$th->getLine());
            return null;
        }
    }
    
}
