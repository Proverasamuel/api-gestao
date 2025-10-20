<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relatorio extends Model
{
    protected $fillable = ['titulo', 'conteudo', 'user_id'];

    public function funcionario()
    {
        return $this->belongsTo(User::class);
    }
}

