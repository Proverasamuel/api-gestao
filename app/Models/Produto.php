<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'marca',
        'referencia',
        'categoria_id',
        'quantidade_total',
        'preco',
        'icone',
        'imagem',
        'status',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function vendas()
    {
        return $this->belongsToMany(Venda::class, 'venda_produto')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }

    public function stocks()
    {
        return $this->hasMany(StockLoja::class);
    }
}

