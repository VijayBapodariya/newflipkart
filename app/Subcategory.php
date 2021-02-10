<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $primaryKey = 'sub_id';
    protected $table = 'sub_categories'; 
    public $timestamp = FALSE;
}
