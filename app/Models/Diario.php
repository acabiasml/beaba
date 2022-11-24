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

    protected $appends = ['traduzgem'];

    public function getTraduzgemAttribute(){
        if($this->geminada == "0"){
            return "SIMPLES";
        }else{
            return "GEMINADA";
        }
    }
}
