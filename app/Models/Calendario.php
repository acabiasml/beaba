<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Calendario extends Model{

    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'nome', 'ano', 'escolas_id'];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }

    public function periodos(){
        return $this->hasMany(Periodo::class);
    }
 
    public function escola(){
        return $this->belongsTo(Escola::class, 'escolas_id');
    }
}
