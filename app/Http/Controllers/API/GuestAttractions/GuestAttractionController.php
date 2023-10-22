<?php

namespace App\Http\Controllers\API\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GuestAttraction;
use App\Models\Attraction;
use App\Models\Guest;
use App\Http\Requests\GuestAttractions\StoreRequest;
use App\Models\PriceAttraction;
use App\Services\Guest\GuestService;
use App\Http\Requests\Guest\GuestRequest;
use App\Http\Requests\GuestAttractions\NewGuestFreeRequest;

use App\Traits\ParseTimeTrait;

use App\Services\Guest\GuestAttractionService;

class GuestAttractionController extends Controller
{
    use ParseTimeTrait;
    private $guestService;
    private $guestAttractionService;
    public function __construct() 
    {
        $this->guestService = new GuestService();
        $this->guestAttractionService = new GuestAttractionService();
    }

    public function index(Attraction $attraction) 
    {
        try {

            $guests = Guest::SELECT('guests.*','entry_time', 'departure_time', 'is_active', 'guest_attractions.id as guest_attraction_id')
            ->JOIN('guest_attractions','guests.id','=','guest_id')
            ->JOIN('price_attractions','price_attraction_id','=','price_attractions.id')
            ->WHERE('price_attractions.attraction_id','=',$attraction->id)
            ->get();
            return response()->json([
    			'message'=>'success',
    			'data'=>$guests
    		], 200);
        } catch (\Throwable $th) {
            \Log::critical('ERROR Index GuestAttraction '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		], 500);
        }
    }

    public function store(StoreRequest $request, GuestRequest $guestRequest, Attraction $attraction)
    {
        $guest = $this->guestService->store($guestRequest->validated());
        $priceAttraction = PriceAttraction::find($request->price_attraction_id);
        
        $resp = $this->guestAttractionService->store([
            'guest_id' => $guest->id,
            'price_attraction_id' => $priceAttraction->id,
            'entry_time'=> $this->entryTime($request->entry_time),
            'departure_time'=>$this->finishTime($request->entry_time, $priceAttraction->time)
        ]);
        return $resp;
    }

    public function newAssign(Attraction $attraction, NewGuestFreeRequest $request) {
        $priceAttraction = PriceAttraction::find($request->price_attraction_id);
        $resp = $this->guestAttractionService->store([
            'guest_id' => $request->guest_id,
            'price_attraction_id' => $priceAttraction->id,
            'entry_time'=> $this->entryTime($request->entry_time),
            'departure_time'=>$this->finishTime($request->entry_time, $priceAttraction->time)
        ]);
        return $resp;
    }

    public function finishedTime( GuestAttraction $guestAttraction)
    {
        try {
            $guestAttraction->update(['is_active'=>false]);
            return response()->json([
    			'message'=>'success',
    			'data'=>null
    		]);
        } catch (\Throwable $th) {
            \Log::critical('ERROR Create GuestAttraction '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		], 500);
        }
    }
}
