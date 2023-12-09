<?php

namespace App\Repositories\Guest;

use App\Models\GuestAttraction;
use App\Models\Guest;
use Carbon\Carbon;
use DB;

class GuestAttractionRepository
{
    public function store($data) 
    {
        return GuestAttraction::create($data);
    }

    public function ckeckStatusGuest(int $attractionId, String $guestId)
    {
        return GuestAttraction::select('*', 'guest_attractions.id as id')
            ->join('price_attractions', 'price_attractions.id','=', 'price_attraction_id')
            ->where('price_attractions.attraction_id',$attractionId)
            ->where('guest_id', $guestId)
            ->whereDate('guest_attractions.created_at', Carbon::today())
            ->orderBy('guest_attractions.created_at','DESC')
            ->first();
    }

    public function listGuestOnAttractionToMobile($attractionId, $isActive)
    {
        return Guest::SELECT('guests.*','entry_time', 'departure_time', 'is_active', 'guest_attractions.id as guest_attraction_id')
        ->JOIN('guest_attractions','guests.id','=','guest_id')
        ->JOIN('price_attractions','price_attraction_id','=','price_attractions.id')
        ->WHERE('price_attractions.attraction_id','=',$attractionId)
        //->WHERE('guest_attractions.is_active','=',$isActive)
        ->whereDate('guest_attractions.created_at', Carbon::today())
        ->join(DB::raw('(SELECT guest_id, MAX(guest_attractions.created_at) AS max_created_at
            FROM guest_attractions
            GROUP BY guest_id) latest_entries'),
            function ($join) {
                $join->on('guests.id', '=', 'latest_entries.guest_id')
                    ->on('guest_attractions.created_at', '=', 'latest_entries.max_created_at');
            })
        ->get();
    }
}
