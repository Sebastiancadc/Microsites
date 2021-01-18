<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\CambiarPassword;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;


    protected $table = 'usuario';
    protected $guarded = ['id'];
	protected $primaryKey = 'id';

    protected $fillable = [
        'username','email','ciudad','role','photo','password','pass','Rol_Id_Rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     /**
     * Send the email verification notification.
     *
     * @return void
     */
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new \Illuminate\Auth\Notifications\VerifyEmail);
    // }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CambiarPassword($token));
    }

    public function admin()
    {
        return $this->role === 'admin';
    }
    public function colaborador()
    {
        return $this->role === 'colaborador';
    }
    
    public function noticias()
    {
        return $this->hasMany('App\Noticia');
    }

    public function permisos()
    {
        return $this->hasMany('App\Permisos');
    }
    
}