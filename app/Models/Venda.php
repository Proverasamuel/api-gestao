<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = ['user_id', 'loja_id', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'venda_produto')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }
}


