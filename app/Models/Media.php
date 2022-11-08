<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Media extends Model
{

    protected $table = "medias";

    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'nota', 'componentes_id', 'users_id', 'periodos_id'];

    public function componente(){
        return $this->belongsTo(Componente::class, 'componentes_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class, 'periodos_id');
    }
}
