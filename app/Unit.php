<?php

namespace teaco;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
   protected $table = 'units';

    protected $fillable = [
        'unit_name',
    ];
}
