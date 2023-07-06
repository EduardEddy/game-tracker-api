<?php

namespace App\Http\Controllers\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GuestAttraction;
use App\Models\PriceAttraction;

class GuestAttractionController extends Controller
{
    public function index()
    {
        $activities = GuestAttraction::with('guests','priceAttraction')->paginate(10);
        return view('activities.index', ['activities'=>$activities]);
    }

    public function total() 
    {
        $subtotal = GuestAttraction::all();
        $total = 0;
        foreach ($subtotal as $key => $stotal) {
            $total = $total + $stotal->priceAttraction->price;
        }
        return response()->json($total, 200);
    }
}
