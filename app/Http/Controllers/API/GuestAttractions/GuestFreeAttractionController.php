<?php

namespace App\Http\Controllers\API\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Attraction;
use App\Models\PriceAttraction;

use App\Http\Requests\Guest\GuestRequest;
use App\Http\Requests\GuestAttractions\StoreFreeRequest;
use App\Http\Requests\GuestAttractions\NewGuestFreeRequest;

use App\Services\Guest\GuestService;
use App\Services\Guest\GuestAttractionService;
use App\Traits\ParseTimeTrait;

class GuestFreeAttractionController extends Controller
{
    use ParseTimeTrait;
    private $guestService;
    private $guestAttractionService;
    public function __construct() 
    {
        $this->guestService = new GuestService();
        $this->guestAttractionService = new GuestAttractionService();
    }

    public function store(Attraction $attraction, GuestRequest $guestRequest, StoreFreeRequest $request)
    {
            $guest = $this->guestService->store($guestRequest->validated());
            $priceAttraction = PriceAttraction::whereAttractionId($attraction->id)->first();
            $resp = $this->guestAttractionService->store([
                'guest_id' => $guest->id,
                'price_attraction_id' => $priceAttraction->id,
                'entry_time'=> $this->entryTime($request->entry_time),
                'departure_time'=>0
            ]);
            return $resp;
    }

    public function newAssign(Attraction $attraction, NewGuestFreeRequest $request) 
    {
        $priceAttraction = PriceAttraction::whereAttractionId($attraction->id)->first();
        $resp = $this->guestAttractionService->store([
            'guest_id' => $request->guest_id,
            'price_attraction_id' => $priceAttraction->id,
            'entry_time'=> $this->entryTime($request->entry_time),
            'departure_time'=> 0
        ]);
        return $resp;
    }
}
