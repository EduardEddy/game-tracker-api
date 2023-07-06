<?php

namespace App\Helpers\CarbonDate;
use Carbon\Carbon;

class DateBase
{
    public $now;
    public function _construct()
    {
        $this->now = Carbon::now('-05:00');
    }

    public static function get_now()
    {
        return $this->now;
    }
}
