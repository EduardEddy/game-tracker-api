<?php

namespace App\Repositories\Guest;

use App\Models\Guest;

class GuestRepository
{
    public function store($data) 
    {
        return Guest::create($data);
    }
}
