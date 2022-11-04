<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Componente extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'nome', 'horas', 'cursos_id', 'professor']; 

    protected $appends = ['regente']; 

    public function getRegenteAttribute(){
        return User::find($this->professor)->nome;
    }

    public function horarios(){
        return $this->hasMany(Horario::class);
    }

    public function diarios(){
        return $this->hasMany(Diario::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
