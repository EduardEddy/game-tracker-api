<?php

namespace App\Observers\Attractions;

use App\Models\Attraction;
use Auth;

class AttractionObserver
{
    public function creating(Attraction $attraction)
    {
        $attraction->description = '';
        $attraction->park_id = Auth::user()->Parks->first()->id;
        $attraction->is_free_time = $attraction->is_free_time == 'on' ? true: false;
    }

    public function updating(Attraction $attraction)
    {
        \Log::alert("message: ".$attraction->is_free_time ?? 'no');
        $attraction->is_free_time = $attraction->is_free_time == 'on' ? true: false;
    }
}
