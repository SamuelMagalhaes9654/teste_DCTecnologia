<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $fillable = [
        'venda_id',
        'numero_parcela',
        'data_vencimento',
        'valor'
    ];

    public function venda() {
        return $this->belongsTo(Venda::class);
    }
}
