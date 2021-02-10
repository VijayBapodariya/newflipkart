<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
        protected $primaryKey = 'order_detail_id'; 
    protected $table = 'order_details'; 
    public $timestamp = FALSE; 
}
