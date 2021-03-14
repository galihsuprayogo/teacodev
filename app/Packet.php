<?php

namespace teaco;

use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
   	protected $table = 'packets';
   	protected $fillable = 
     [
        'packet_id', 'packet_name', 'packet_status',  
     ];
}
