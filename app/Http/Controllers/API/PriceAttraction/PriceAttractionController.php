<?php

namespace App\Http\Controllers\API\PriceAttraction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\PriceAttraction;

class PriceAttractionController extends Controller
{
    public function index(Attraction $attraction) 
    {
        try {
            
            $list = PriceAttraction::where('attraction_id',$attraction->id)->get();
            return response()->json([
    			'message'=>'success',
    			'data'=>$list
    		], 200);
        } catch (\Throwable $th) {
            \Log::critical('ERROR index PriceAttractions '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		],500);
        }
    }
}
