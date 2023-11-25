<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Guest;
use App\Models\Attraction;
use App\Models\PriceAttraction;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class GuestAttraction extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'guest_id','price_attraction_id','entry_time','departure_time','is_active'
    ];

    public function guests() 
    {
        return $this->hasMany(Guest::class, 'id', 'guest_id');
    }

    /*public function attractions() 
    {
        return $this->hasMany(Attraction::class, 'id', 'attraction_id');
    }*/

    /**
     * Get the priceAttraction associated with the GuestAttraction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function priceAttraction()
    {
        return $this->hasOne(PriceAttraction::class, 'id', 'price_attraction_id');
    }
}
