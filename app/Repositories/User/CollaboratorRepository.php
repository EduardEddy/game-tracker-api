<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Models\CollaboratorPark;


class CollaboratorRepository
{
    public function create($collaborator, $parkId)
    {
        $user = User::create($collaborator);
        CollaboratorPark::create([
            'user_id'=>$user->id,
            'park_id'=>$parkId
        ]);
    }

    public function index($parkId)
    {
        $userParks = CollaboratorPark::where('park_id', $parkId)->get();
        \Log::alert($userParks);
        $users = [];
        foreach ($userParks as $key => $park) {
            array_push($users, User::find($park->user_id));
        }
        return $users;
    }
}
 