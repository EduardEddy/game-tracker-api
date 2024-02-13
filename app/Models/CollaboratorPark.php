<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

use App\Models\User;
use App\Models\Park;

class CollaboratorPark extends Pivot
{
    use HasFactory, HasUuids;
    protected $table = 'colaborator_parks';
    protected $fillable = [
        'user_id','park_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Park()
    {
        return $this->belongsTo(Park::class, 'park_id');
    }
}
