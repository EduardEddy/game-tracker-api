<?php

namespace App\Http\Controllers\API\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Guest;
use App\Http\Requests\Guest\GuestRequest;
use App\Helpers\HandleErrorResponse;

class GuestController extends Controller
{
    protected $handleError;
    function __construct()
    {
        $this->handleError = new HandleErrorResponse();
    }

    public function store(GuestRequest $request)
    {
        try {
            $guest = Guest::create($request->validated());
            return response()->json([
    			'message'=>'success',
    			'data'=>$guest
    		],200);
        } catch (\Throwable $th) {
            return $this->handleError->handleError('Create Guest '.$th->getMessage().' Line: '.$th->getLine());
        }
        
    }

    public function checkrates() {
        $curl = curl_init();
        $body = [
                'checkIn' => '2023-06-10',
                'checkOut' => '2023-06-15',
                'roomCriteria' => [
                    [
                        'paxes' => [
                            [
                                'age' => 30,
                                'name' => 'string',
                                'surname' => 'string'
                            ],
                            [
                                'age' => 30,
                                'name' => 'string',
                                'surname' => 'string'
                            ]
                        ]
                    ]
                ],
                'hotelIds'=> [
                    100571,
                    100258,
                    101311,
                    102972
                ],
                'hotelRateFilter' => [
                    'nonRefundable' => false
                ],
                'market' => 'US'
            ];
            
        $json_string = json_encode($body);
        curl_setopt($curl, CURLOPT_URL, 'http://ptapi-int.pricetravel.com/1.0/hotels/rates/');
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization: Bearer eyJhbGciOiJSUzI1NiIsImtpZCI6InBHc29iTHE0d1RVOTdMWjBINEdTT0EiLCJ0eXAiOiJhdCtqd3QifQ.eyJuYmYiOjE2ODQ1Mjc3MTcsImV4cCI6MTY4NDUzMTMxNywiaXNzIjoiaHR0cDovL3lpcm8ta2VyYmVyb3MuZWJhLWtiNDVhZXI0LnVzLWVhc3QtMS5lbGFzdGljYmVhbnN0YWxrLmNvbSIsImF1ZCI6WyJhZG1pbl9hcGkiLCJjbGllbnRfYXBpX3dob2xlc2FsZXIiXSwiY2xpZW50X2lkIjoiNzY2YTE3ZGJkZjZlNGUzNWEzNWViNTViNjJlYzliOWYiLCJjaGFubmVsX2lkIjoiMTgxMyIsIndob2xlc2FsZXJfaWQiOiI4ODciLCJzaXRlX2lkIjoiMTM4NCIsImFnZW5jeV9pZCI6Ijg4NjUiLCJjb25uZWN0b3JfaWQiOiIxIiwic2NvcGUiOlsiYWRtaW5fYXBpIiwiY2xpZW50X2FwaV93aG9sZXNhbGVyIl19.Mv4o7da3Qxzs923HuqIlwl19SQMwFpLS5rhDVKh3ICpDKPLhE8U60BM-TRdAnnQmLMebltv-LO6-6KufT8tAheuvw2AZt6eLCvQQbR-lwmzbrPReZaMhgIjuRO4LiUbwOF2o0lCZorVUWS2t7PJo2unACuD5K3bIPBI3Dnv31b_lPvcKsPZ_0-ZyZnBw39TSTFKAcUdbC3g_4OSDvygzOpasO_Yo9CENFo580JbbRZTpuVliGJMPvFcoHDVWSbgq5evPybzy6gsAUMl-_ZSdj666KBThhd0lzLRwYEPkPUpwfUmsaR2MDfMPeMqQBAZvrzUGireitxxVw1yEQMbfig'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
        $data = curl_exec($curl);
        curl_close($curl);

        return $data;
    }

    public function show(Guest $guest) 
    {
        try {
            return response()->json([
                'message'=>'success',
                'data'=>$guest 
            ], 200);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("error GuestController::show {$th->getMessage()} Line: {$th->getLine()}");
        }
    }
}
