<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Park;
use App\Models\User;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class FCMToken extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'fmc_tokens';
    protected $fillable = [ 'token', 'is_login', 'user_id', 'park_id' ];

    public function Parks()
    {
        return $this->belongsTo(Park::class, 'park_id', 'id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
