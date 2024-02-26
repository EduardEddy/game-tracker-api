<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TrackerExport;
use App\Models\GuestAttraction;
use Carbon\Carbon;
use App\Helpers\CarbonDate\DateBase;
use App\Services\Guest\GuestAttractionService;

class ExportController extends Controller
{
    private $guestAttractionService;
    public function __construct() 
    {
        $this->guestAttractionService = new GuestAttractionService();
    }

    public function __invoke(Request $request)
    {
        $date = $request->date ? Carbon::parse($request->date) : Carbon::now();
        $activities = $this->guestAttractionService->toDownload($date);
        $listToExport = $this->createArray($activities);
        $day = $date->locale('es')->dayName.'_'.$date->toDateString();
        return Excel::download(new TrackerExport($listToExport), "play_time_monitor_{$day}.xlsx");
    }

    private function createArray($activities)
    {
        \Log::alert($activities);
        $listToExport = [];
        array_push(
            $listToExport, ['Niño','Hora entrada','Hora salida','Minutos','Fecha','Monto']
        );
        $total = 0;
        foreach ($activities as $key => $activity) {
            if( $activity->priceAttraction->time == 0){
                $departureTime = 'N/A';
                $time = 'sin tiempo específico';
            } else {
                $departureTime = $activity->departure_time;
                $time = $activity->priceAttraction->time;
            }
            array_push($listToExport, [
                $activity->guests->first()->child_fullname,
                $activity->entry_time,
                $departureTime,
                $time,
                Carbon::parse($activity->date_create)->toDateString(),
                $activity->priceAttraction->price,
            ]);
            $total = $total + $activity->priceAttraction->price;
        }
        array_push($listToExport,[
            '','','','','','',
        ]);
        array_push($listToExport,[
            '','','','','TOTAL:',$total,
        ]);
        return $listToExport;
    }
}
