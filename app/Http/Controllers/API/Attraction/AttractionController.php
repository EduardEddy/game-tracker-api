<?php

namespace App\Http\Controllers\API\Attraction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Models\Attraction;
use App\Models\Park;

class AttractionController extends Controller
{
    public function index()
    {
        try {
            $park = Park::whereUserId(1/*Auth::user()->id*/)->first();
            return response()->json([
                'message'=>'success',
                'data'=>Attraction::whereParkId($park->id)->get()
            ], 200);
        } catch (\Throwable $th) {
            \Log::critical('ERROR List Attractions '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		],500);
        }
    }

    public function show(Attraction $attraction)
    {
        try {
            $attraction->prices;
            return response()->json([
    			'message'=>'success',
    			'data'=>$attraction
    		]);
        } catch (\Throwable $th) {
            \Log::critical('ERROR show Attractions '.$th->getMessage().' Line: '.$th->getLine());
            return response()->json([
    			'message'=>'internal error',
    			'data'=>null
    		],500);
        }
    }
}
