<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Frequencia extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $fillable = ['id', 'presenca', 'diarios_id', 'users_id', 'turmas_id'];

    public function diario(){
        return $this->belongsTo(Diario::class, 'diarios_id');
    }
}
