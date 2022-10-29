<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Curso extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'nome', 'inicio', 'fim', 'status', 'calendarios_id'];

    protected $appends = ['inicial', 'final'];

    public function calendario(){
        return $this->belongsTo(Calendario::class); 
    }

    public function getInicialAttribute(){
        return Periodo::find($this->inicio)->nome;
    }

    public function getFinalAttribute(){
        return Periodo::find($this->fim)->nome;
    }
}
 