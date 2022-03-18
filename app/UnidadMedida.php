<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnidadMedida extends Model
{
    //
    protected $table = 'unidad_medida';
    protected $guarded = ['id', 'codigo'];

    use SoftDeletes;
}
