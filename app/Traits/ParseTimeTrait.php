<?php

namespace App\Traits;

use Carbon\Carbon;

trait ParseTimeTrait 
{
    public function entryTime($time)
    {
        return Carbon::parse($time)->addMinutes(0)->format('H:i:s');
    }

    public function finishTime($entry, $minutes)
    {
        return Carbon::parse($entry)->addMinutes($minutes)->format('H:i:s');
    } 
}
