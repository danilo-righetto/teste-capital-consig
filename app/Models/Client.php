<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'cpf', 'data_nascimento', 'rua', 'numero_rua', 'cep', 'cidade', 'estado', 'ativo'];
    protected $hidden = ['created_at', 'updated_at'];

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('nome');
        });
    }
}
