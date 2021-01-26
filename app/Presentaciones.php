<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presentaciones extends Model
{
    protected $table = 'presentaciones';
    protected $guarded = ['id'];
	protected $primaryKey = 'id';
    protected $fillable = [
        'user_id','title','campana','fecha','color','colortitulos','colocontenido'
    ];

}