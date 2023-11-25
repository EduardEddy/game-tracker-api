<?php

namespace App\Repositories\Guest;

use App\Models\GuestAttraction;
use Carbon\Carbon;

class GuestAttractionRepository
{
    public function store($data) 
    {
        return GuestAttraction::create($data);
    }

    public function ckeckStatusGuest(int $attractionId, String $guestId)
    {
        return GuestAttraction::join('price_attractions', 'price_attractions.id','=', 'price_attraction_id')
            ->where('price_attractions.attraction_id',$attractionId)
            ->where('guest_id', $guestId)
            ->whereDate('guest_attractions.created_at', Carbon::today())
            ->orderBy('guest_attractions.created_at','DESC')
            ->first();
    }
}
