<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLoja extends Model
{
    protected $table = 'stock_loja';
    protected $fillable = ['loja_id', 'produto_id', 'quantidade'];

    public function loja()
    {
        return $this->belongsTo(Loja::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}

