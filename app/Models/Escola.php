<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Escola extends Model{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'nome', 'fundacao', 'info', 'razao', 'cnpj', 'telefone', 'email',
                            'site', 'endereco', 'bairro', 'numero', 'cidade', 'estado', 'cep', 
                            'diretor', 'coordenador', 'secretario'];

    public function calendarios(){
        return $this->hasMany(Calendario::class);
    }
}
