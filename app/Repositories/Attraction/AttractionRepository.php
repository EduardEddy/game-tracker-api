<?php

namespace App\Repositories\Attraction;

use App\Models\Park;
use App\Models\User;
use App\Models\CollaboratorPark;

class AttractionRepository
{
    public function attractionByAdminUser(User $user) 
    {
        return Park::whereUserId($user->id)->first();
    }

    public function attractionByCollaboratorUser(User $user)
    {
        $collaboratorPark = CollaboratorPark::whereUserId($user->id)->first();
        return Park::where('id',$collaboratorPark->park_id)->first();
    }
}
