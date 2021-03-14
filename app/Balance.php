<?php

namespace teaco;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
     protected $table = 'balances';

     protected $fillable = [
        'balance_date', 'balance_time', 'balance', 'money_in', 'money_out',
     ];
}
