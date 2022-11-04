<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Turma extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'datamatricula', 'datatransf', 'status', 'cursos_id', 'users_id'];

    protected $appends = ['aluno']; 

    public function getAlunoAttribute(){
        return User::find($this->users_id)->nome;
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
 
    public function frequencia(){
        return $this->hasMany(Frequencia::class);
    }
}
