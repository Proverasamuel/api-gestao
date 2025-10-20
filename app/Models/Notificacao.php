<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $fillable = ['titulo', 'mensagem', 'lida', 'user_id'];

    public function funcionario()
    {
        return $this->belongsTo(User::class);
    }
}

