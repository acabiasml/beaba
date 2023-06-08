<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Aviso extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'dia', 'aviso', 'escola', 'enviadopor'];

    public function escola(){
        return $this->belongsTo(Escola::class, 'escola');
    }

    public function enviadopor(){
        return $this->belongsTo(User::class, 'enviadopor');
    }
}
