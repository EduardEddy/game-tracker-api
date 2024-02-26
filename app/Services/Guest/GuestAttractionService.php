<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;
use App\Repositories\Guest\GuestAttractionRepository;
use Auth; 
use Carbon\Carbon;
use App\Helpers\HandleErrorResponse;
use App\Helpers\HandleDifferencesTime;

class GuestAttractionService
{
    protected $guestAttractionRepository;
    protected $handleError;
    public function __construct()
    {
        $this->guestAttractionRepository = new GuestAttractionRepository();
        $this->handleError = new HandleErrorResponse();
    }

    public function index($date)
    {
        try {
            return GuestAttraction::select('*','guest_attractions.created_at as date_create')->with('guests','priceAttraction')
            ->join('price_attractions','price_attractions.id','=','guest_attractions.price_attraction_id')
            ->join('attractions','price_attractions.attraction_id','attractions.id')
            ->join('parks','parks.id', '=', 'attractions.park_id')
            ->where('parks.user_id', Auth::user()->id)
            ->whereDate('guest_attractions.created_at', $date)
            ->paginate(10);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on UserService::create ".$th->getMessage());
        }
    }

    public function store($data)
    {
        try {
            $this->guestAttractionRepository->store($data);
            return response()->json([
    			'message'=>'success',
    			'data'=>null
    		], 201);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on GuestAttractionService::store ".$th->getMessage());
        }
    }
    
    public function listGuestToMobile($attractionId, $isActive) 
    {
        try {
            $listGuest = $this->guestAttractionRepository->listGuestOnAttractionToMobile($attractionId, $isActive);
            $newList = [];
            foreach ($listGuest as $key => $guest) {
                if ($guest->is_active == $isActive) {
                    if($isActive){
                        $handleDifferencesTime = new HandleDifferencesTime(); 
                        // Obtén la hora actual del servidor
                        $currentTime = date('H:i:s');
                        $difference = $handleDifferencesTime->calculateDifferencesTime($guest->departure_time, $currentTime);
                        $guest['difference'] = $difference;
                    }
                    array_push($newList, $guest);
                }
            }

            return response()->json([
    			'message'=>'success',
    			'data'=>$newList
    		], 200);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on GuestAttractionService::listGuestToMobile ".$th->getMessage()." Line: ".$th->getLine());
        }
    }

    function filtroIsActive($elemento) {
        return $elemento['is_active'] == 1;
    }

    public function total($date) {
        try {
            $total = $this->guestAttractionRepository->total($date, Auth::user()->id);
            return response()->json($total->total, 200);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on GuestAttractionService::total ".$th->getMessage()." Line: ".$th->getLine());
        }
    }

    public function toDownload($date)
    {
        try {
            return $this->guestAttractionRepository->toDownload($date, Auth::user()->id);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on GuestAttractionService::toDownload ".$th->getMessage()." Line: ".$th->getLine());
        }
    }
}
