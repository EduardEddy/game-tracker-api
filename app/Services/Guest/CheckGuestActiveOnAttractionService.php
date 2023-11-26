<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;
use App\Repositories\Guest\GuestAttractionRepository;
use App\Helpers\HandleErrorResponse;

class CheckGuestActiveOnAttractionService
{
    protected $guestAttractionRepository = null;
    protected $handleError;
    function __construct() 
    {
        $this->guestAttractionRepository = new GuestAttractionRepository();
        $this->handleError = new HandleErrorResponse();
    }

    public function ckeckStatusGuest($attractionId, $guestId)
    {
        try {
            return response()->json([
                'message'=>'success',
                'data'=>$this->guestAttractionRepository->ckeckStatusGuest($attractionId, $guestId)
            ]);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on CheckGuestActiveOnAttractionService::ckeckStatusGuest ".$th->getMessage());
        }
    }
}
