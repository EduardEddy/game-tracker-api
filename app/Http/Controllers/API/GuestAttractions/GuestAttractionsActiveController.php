<?php

namespace App\Http\Controllers\API\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Guest;
use App\Services\Guest\CheckGuestActiveOnAttractionService;

class GuestAttractionsActiveController extends Controller
{
    protected $checkGuestAttraction;
    function __construct()
    {
        $this->checkGuestAttraction = new CheckGuestActiveOnAttractionService;
    }

    public function __invoke(Attraction $attraction, Guest $guest) 
    {
        return $this->checkGuestAttraction->ckeckStatusGuest($attraction->id, $guest->id);
    }
}
