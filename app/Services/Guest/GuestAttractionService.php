<?php

namespace App\Services\Guest;

use App\Models\GuestAttraction;

class GuestAttractionService
{
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
}
