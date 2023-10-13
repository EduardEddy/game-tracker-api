<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;
use App\Repositories\Guest\GuestAttractionRepository;

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
            return GuestAttraction::with('guests','priceAttraction')->paginate(10);
        } catch (\Throwable $th) {
            Log::critical("Error on UserService::create ".$th->getMessage());
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
