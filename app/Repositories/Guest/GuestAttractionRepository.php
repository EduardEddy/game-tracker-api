<?php

namespace App\Repositories\Guest;

use App\Models\GuestAttraction;

class GuestAttractionRepository
{
    public function store($data) 
    {
        return GuestAttraction::create($data);
    }
}
