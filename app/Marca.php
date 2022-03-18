<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{
    //
    protected $table = 'marca';
    protected $guarded = ['id', 'codigo'];
    use SoftDeletes;
}
