<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;



class Noticia extends Model
{
    use Notifiable;

    protected $table = 'noticias';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';

    protected $fillable = ['user_id','category_id','campana','title','slug','fecha','image','created_at','updated_at'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
        {
        return $this->belongsTo('App\User','user_id','id');
    }
}
