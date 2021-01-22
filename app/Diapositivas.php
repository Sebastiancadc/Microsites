<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diapositivas extends Model
{
    protected $table = 'diapositiva';
    protected $guarded = ['id'];
	protected $primaryKey = 'id';
    protected $fillable = [
        'id','number','numero_pg','titulo','imagen','imagen_fondo','contenido','campana'
    ];
}