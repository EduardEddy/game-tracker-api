<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;
use App\Repositories\Guest\GuestAttractionRepository;
use Auth; 
use Carbon\Carbon;
use App\Helpers\HandleErrorResponse;

class GuestAttractionService
{
    protected $guestAttractionRepository;
    protected $handleError;
    public function __construct()
    {
        $this->guestAttractionRepository = new GuestAttractionRepository();
        $this->handleError = new HandleErrorResponse();
    }

    public function index()
    {
        try {
            return GuestAttraction::with('guests','priceAttraction')
            ->join('price_attractions','price_attractions.id','=','guest_attractions.price_attraction_id')
            ->join('attractions','price_attractions.attraction_id','attractions.id')
            ->join('parks','parks.id', '=', 'attractions.park_id')
            ->where('parks.user_id',Auth::user()->id)
            ->whereDate('guest_attractions.created_at', Carbon::today())
            ->paginate(10);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on UserService::create ".$th->getMessage());
        }
    }

    public function total()
    {
        try {
            $subtotal = GuestAttraction::all();
            $total = 0;
            foreach ($subtotal as $key => $stotal) {
                $total = $total + $stotal->priceAttraction->price;
            }
            return response()->json($total, 200);
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
                    array_push($newList, $guest);
                }
            }

            return response()->json([
    			'message'=>'success',
    			'data'=>$newList
    		], 200);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on GuestAttractionService::listGuestToMobile ".$th->getMessage());
        }
    }

    function filtroIsActive($elemento) {
        return $elemento['is_active'] == 1;
    }
}
