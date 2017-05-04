<?php

namespace App\Location;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'regency_id',
        'name',
    ];
}
