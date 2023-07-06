<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\Guest;
use App\Models\Attraction;
use App\Models\PriceAttraction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GuestAttraction>
 */
class GuestAttractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id_gust = Guest::inRandomOrder()->first();
        //$id_attraction = Attraction::inRandomOrder()->first();
        $id_attraction = PriceAttraction::inRandomOrder()->first();
        $priceAttraction = PriceAttraction::find($id_attraction);
        
        if ($priceAttraction->first()->time == 0) {
            $minutes = 0;
        }else{
            $minute = [15,30,60];
            $minutes = $minute[rand(0,2)];
        }
        $now = Carbon::now('-05:00');
        $hour = Carbon::parse($now)->format('H:i:s');
        $finish_time = Carbon::parse($now->addMinutes($minutes))->format('H:i:s');
        
        return [
            'guest_id' => $id_gust,
            'price_attraction_id' => $id_attraction,
            'entry_time' => $hour,
            'departure_time' => $finish_time,
        ];
    }
}
