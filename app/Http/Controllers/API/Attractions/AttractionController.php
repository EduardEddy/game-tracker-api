<?php

namespace App\Http\Controllers\API\Attractions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Attraction;
use App\Models\Park;

use App\Services\Attraction\AttractionService;

class AttractionController extends Controller
{
    protected $attractionService;
    public function __construct()
    {
        $this->attractionService = new AttractionService();
    }

    public function index()
    {
        return $this->attractionService->index(Auth::user());
    }

    public function show(Attraction $attraction)
    {
        return $this->attractionService->show($attraction);
    }
}
