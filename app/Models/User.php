<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['id', 'nome', 'email', 'password', 'codigo', 'arquivado', 'tipo', 'inep', 'nomesocial', 
                            'nascimento', 'sexo', 'cor', 'gemeo', 'genitora', 'genitor',
                            'responsavel', 'responcpf', 'respontel1', 'respontel2', 'nacionalidade',
                            'naturalidade', 'naturaif', 'identidade', 'identemissor', 'identuf',
                            'identexpedicao', 'cpf', 'docextrangeiro', 'certidao', 'certifolha',
                            'certilivro', 'certiemissao', 'titulo', 'titulozona', 'titulosessao',
                            'titulouf', 'docmilitar', 'endereco', 'endnumero', 'endbairro',
                            'endcidade', 'endcomplemento', 'endcep', 'enduf', 'telefone1',
                            'telefone2', 'cartaosus', 'tiposangue', 'nutricionais', 'nis',
                            'carteiratrab', 'habilitacao', 'habilcategoria', 'habilvalidade',
                            'banco', 'agencia', 'conta', 'created_at', 'updated_at'];

    public function medias(){
        return $this->hasMany(Media::class);
    }
}
