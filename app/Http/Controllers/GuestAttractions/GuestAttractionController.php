<?php

namespace App\Http\Controllers\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GuestAttraction;
use App\Models\PriceAttraction;

use App\Services\Guest\GuestAttractionService;

use Carbon\Carbon;

class GuestAttractionController extends Controller
{
    private $guestAttractionService;
    public function __construct() 
    {
        $this->guestAttractionService = new GuestAttractionService();
    }

    public function index(Request $request)
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::now();
        $activities = $this->guestAttractionService->index($date);
        return view('activities.index', ['activities'=>$activities, 'date'=>$date->format('m/d/Y')]);
    }

    public function total(Request $request) 
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::now();
        $subtotal = $this->guestAttractionService->index($date);
        $total = 0;
        foreach ($subtotal as $key => $stotal) {
            $total = $total + $stotal->priceAttraction->price;
        }
        return response()->json($total, 200);
    }
}
