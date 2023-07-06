<?php

namespace App\Http\Controllers\Exports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TrackerExport;
use App\Models\GuestAttraction;
use Carbon\Carbon;
use App\Helpers\CarbonDate\DateBase;

class ExportController extends Controller
{
    public function __invoke(Request $request)
    {
        $activities = GuestAttraction::with('guests','priceAttraction')->get();
        $listToExport = $this->createArray($activities);
        $now = Carbon::now('-05:00');
        $day = $now->locale('es')->dayName.'_'.$now->toDateString();
        return Excel::download(new TrackerExport($listToExport), "tracker_{$day}.xlsx");
    }

    private function createArray($activities)
    {

        $listToExport = [];
        array_push(
            $listToExport, ['Niño','Hora entrada','Hora salida','Minutos','Monto']
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
                $activity->priceAttraction->price,
            ]);
            $total = $total + $activity->priceAttraction->price;
        }

        array_push($listToExport,[
            '','','','TOTAL:',$total,
        ]);
        return $listToExport;
    }
}
