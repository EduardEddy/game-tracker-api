<?php

namespace App\Helpers;

final class HandleDifferencesTime
{
    public function calculateDifferencesTime($departureTime)
    {
        // Obtén la hora actual del servidor
        $currentTime = date('H:i:s');
    
        // Calcula la diferencia entre ambas horas
        $difference = strtotime($departureTime) - strtotime($currentTime);
        //$difference = strtotime($currentTime) - strtotime($departureTime);
        if($difference < 0){ return "00:00"; }
        // Formatea la diferencia en horas, minutos y segundos
        $minutes = floor(($difference % 3600) / 60);
        $seconds = $difference % 60;
        return "$minutes:$seconds";
    }
}

