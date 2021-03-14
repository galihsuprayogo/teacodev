<?php

namespace teaco;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

     protected $fillable = 
     [
        'menu_id', 'menu_name', 'menu_stock', 'menu_unit', 'menu_type', 'menu_price',
        'menu_discount', 
     ];
}
