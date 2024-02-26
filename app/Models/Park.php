<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Attraction;

class Park extends Model
{
    use HasFactory;
    protected $fillable = [
        'park_name','user_id','update_plan_at','next_payment_date','plan'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function colaborator()
    {
        return $this->belongsToMany(User::class,'colaborator_parks')->withPivot();
    }

    public function attractions()
    {
        return $this->hasMany(Attraction::class, 'park_id');
    }
}
