<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Diario extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'data', 'conteudo', 'componentes_id', 'geminada']; 

    public function frequencias(){
        return $this->hasMany(Frequencia::class);
    }
}
