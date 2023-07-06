<?php

namespace App\Helpers\CarbonDate;

class CustomDate extends DateBase
{
    function __construct(){
        parent::__construct();
    }

    public static function get_now()
    {
        return parent::now;
    }
}
