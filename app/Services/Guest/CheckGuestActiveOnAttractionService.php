<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;
use App\Repositories\Guest\GuestAttractionRepository;

class CheckGuestActiveOnAttractionService
{
    protected $guestAttractionRepository = null;
    function __construct() 
    {
        $this->guestAttractionRepository = new GuestAttractionRepository();
    }

    public function ckeckStatusGuest($attractionId, $guestId)
    {
        try {
            return response()->json([
                'message'=>'success',
                'data'=>$this->guestAttractionRepository->ckeckStatusGuest($attractionId, $guestId)
            ]);
        } catch (\Throwable $th) {
            \Log::critical("Error on CheckGuestActiveOnAttractionService::ckeckStatusGuest ".$th->getMessage());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		], 500);
        }
    }
}
