<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['acao', 'descricao', 'user_id'];

    public function funcionario()
    {
        return $this->belongsTo(User::class);
    }
}

