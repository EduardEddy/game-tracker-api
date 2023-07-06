<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attraction;

class PriceAttraction extends Model
{
    use HasFactory;
    protected $fillable = [
        'price','time','attraction_id'
    ];

    /**
     * Get the user that owns the PriceAttraction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attraction()
    {
        return $this->belongsTo(Attraction::class, 'attraction_id', 'id');
    }
    
}
