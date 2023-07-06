<?php

namespace App\Http\Controllers\API\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GuestAttraction;
use App\Http\Requests\GuestAttractions\StoreRequest;
use App\Models\PriceAttraction;

//use Carbon\Carbon;
use App\Traits\ParseTimeTrait;

class GuestAttractionController extends Controller
{
    use ParseTimeTrait;
    public function store(StoreRequest $request)
    {
        try {
            $priceAttraction = PriceAttraction::find($request->price_attraction_id);

            GuestAttraction::create([
                'guest_id' => $request->guest_id,
                'price_attraction_id' => $request->price_attraction_id,
                'entry_time'=> $this->entryTime($request->entry_time),
                'departure_time'=>$this->finishTime($request->entry_time, $priceAttraction->time)
            ]);
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
