<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Park extends Model
{
    use HasFactory;
    protected $fillable = [
        'park_name','user_id'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function colaborator()
    {
        return $this->belongsToMany(User::class,'colaborator_parks')->withPivot();
    }
}
