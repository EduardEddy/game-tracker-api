<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;
use App\Repositories\Guest\GuestAttractionRepository;
use Auth; 
use Carbon\Carbon;

class GuestAttractionService
{
    protected $guestAttractionRepository;
    public function __construct()
    {
        $this->guestAttractionRepository = new GuestAttractionRepository();
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
            \Log::critical("Error on UserService::create ".$th->getMessage());
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
            Log::critical("Error on UserService::create ".$th->getMessage());
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
            \Log::critical("Error on GuestAttractionService::store ".$th->getMessage());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		], 500);
        }
    }
}
