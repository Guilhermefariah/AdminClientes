<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'data_nascimento',
        'data_cadastro',
        'renda_familiar',
        'cpf',
    ];

    protected $dates = [
        'data_nascimento',
        'data_cadastro',
    ];
}
