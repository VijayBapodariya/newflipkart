<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $primaryKey = 'variation_id';
    protected $table = 'variations';
    public $timestamp = FALSE;
}
