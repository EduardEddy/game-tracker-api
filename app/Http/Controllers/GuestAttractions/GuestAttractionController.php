<?php

namespace App\Http\Controllers\GuestAttractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GuestAttraction;
use App\Models\PriceAttraction;

use App\Services\Guest\GuestAttractionService;

class GuestAttractionController extends Controller
{
    private $guestAttractionService;
    public function __construct() 
    {
        $this->guestAttractionService = new GuestAttractionService();
    }

    public function index()
    {
        $activities = $this->guestAttractionService->index();
        return view('activities.index', ['activities'=>$activities]);
    }

    public function total() 
    {
        $subtotal = $this->guestAttractionService->index();
        $total = 0;
        foreach ($subtotal as $key => $stotal) {
            $total = $total + $stotal->priceAttraction->price;
        }
        return response()->json($total, 200);
    }
}
