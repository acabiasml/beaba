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

    protected $fillable = ['id', 'nome', 'inicio', 'fim', 'status', 'calendarios_id', 'modalidade'];

    protected $appends = ['inicial', 'final', 'horas'];

    public function calendario(){
        return $this->belongsTo(Calendario::class); 
    }

    public function getInicialAttribute(){
        return Periodo::find($this->inicio)->nome;
    }

    public function getFinalAttribute(){
        return Periodo::find($this->fim)->nome;
    }

    public function getHorasAttribute(){
        $total = 0;
        $horasComponentes = Componente::where("cursos_id", $this->id)->get();
        $total = $horasComponentes->sum("horas");
        return $total;
    }
}
 