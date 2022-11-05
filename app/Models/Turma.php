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

    protected $fillable = ['id', 'datamatricula', 'datatransf', 'status', 'tipo', 'cursos_id', 'users_id', 'usermatricula', 'usertransf'];

    protected $appends = ['aluno', 'quemmatriculou', 'quemtransferiu']; 

    public function getQuemmatriculouAttribute(){
        return User::find($this->usermatricula)->nome;
    }

    public function getQuemtransferiuAttribute(){
        if(User::find($this->usertransf)){
            return User::find($this->usertransf)->nome;
        }else{
            return "";
        }
    }

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
