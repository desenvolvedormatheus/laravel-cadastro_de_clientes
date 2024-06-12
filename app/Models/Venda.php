<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_nome',
        'plano_saude',
        'data_contratacao',
        'valor_venda'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
