<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loja extends Model
{
    protected $fillable = ['nome', 'localizacao'];

    public function funcionarios()
    {
        return $this->hasMany(User::class);
    }

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    public function stocks()
    {
        return $this->hasMany(StockLoja::class);
    }
}

