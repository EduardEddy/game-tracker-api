<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Guest extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = [
        'child_fullname','child_description','parent_fullname','cellphone'
    ];
}
