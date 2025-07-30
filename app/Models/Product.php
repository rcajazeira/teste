<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        // Se você tiver uma coluna 'funcao' no banco de dados, adicione-a aqui também:
        // 'funcao',
    ];

    // Se você não quiser proteção de atribuição em massa (NÃO RECOMENDADO PARA PRODUÇÃO, APENAS TESTES RÁPIDOS)
    // protected $guarded = [];
}
