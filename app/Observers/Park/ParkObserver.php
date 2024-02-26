<?php

namespace App\Observers\Park;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Park;

class ParkObserver
{
    public function creating(Park $park)
    {
        if ($park->plan == null || $park->plan == '') {
            $park->plan = 'Basic';
        }
        $park->next_payment_date = Carbon::now()->addMonths(1)->format('Y-m-d');
        $park->update_plan_at = Carbon::now()->format('Y-m-d');
    }
}
