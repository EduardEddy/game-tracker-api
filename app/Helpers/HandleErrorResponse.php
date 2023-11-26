<?php

namespace App\Helpers;

class HandleErrorResponse
{
    public function handleError(String $msg)
    {
        \Log::critical('ERROR '.$msg);
        return response()->json([
            'message'=>'internal error',
            'data'=>null
        ],500);
    }    
}
