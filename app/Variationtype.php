<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variationtype extends Model
{
    protected $primaryKey = 'variation_type_id';
    protected $table = 'variation_types';
    public $timestamp = FALSE;
}
