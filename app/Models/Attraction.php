<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PriceAttraction;

class Attraction extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','is_free_time','park_id'
    ];

    /**
     * Get all of the comments for the Attraction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function prices()
    {
        return $this->hasMany(PriceAttraction::class, 'attraction_id');
    }
}
