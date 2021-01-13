<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    protected $table = 'solicitud';
    protected $guarded = ['id'];
	protected $primaryKey = 'id';

    protected $fillable = [
        'name'
    ];
}
