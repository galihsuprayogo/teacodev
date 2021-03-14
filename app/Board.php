<?php

namespace teaco;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

     protected $fillable = [
        'board_id',
    ];
}
