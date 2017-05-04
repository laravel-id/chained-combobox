<?php

namespace App\Location;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    protected $fillable = [
        'province_id',
        'name',
    ];
}
