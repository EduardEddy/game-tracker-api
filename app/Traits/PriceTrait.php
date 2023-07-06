<?php

namespace App\Traits;

use App\Models\Attraction;
use App\Models\PriceAttraction;

trait PriceTrait 
{
    public function storePrice(Attraction $attraction, int $minutes, float $price )
    {
        PriceAttraction::create([
            'price' => $price,
            'time' => $minutes,
            'attraction_id' => $attraction->id
        ]);
    }

    public function updatePrice(Attraction $attraction, int $minutes, float $price)
    {
        PriceAttraction::updateOrCreate(
            ['attraction_id'=>$attraction->id, 'time'=>$minutes],
            ['price'=>$price]
        );
    }
}