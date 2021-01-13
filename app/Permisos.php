<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Permisos extends Authenticatable implements MustVerifyEmail
{

    protected $table = 'rol';
    protected $guarded = ['Id_Rol'];
	protected $primaryKey = 'Id_Rol';

    protected $fillable = [
        'Roles','create_status','update_status','delete_status'
    ];

}