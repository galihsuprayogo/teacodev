<?php

namespace teaco;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = 
     [
        'order_id', 'order_date', 'order_time', 'customer_name', 'board_order', 'order_status'
     ];
}
