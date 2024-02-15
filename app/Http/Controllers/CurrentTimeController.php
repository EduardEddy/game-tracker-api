<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CurrentTimeController extends Controller
{
    public function index()
    {
        return Carbon::now();
    }
}
