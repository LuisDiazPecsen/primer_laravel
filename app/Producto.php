<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    //
    protected $table = 'producto';
    protected $guarded = ['id', 'codigo'];

    use SoftDeletes;
}
