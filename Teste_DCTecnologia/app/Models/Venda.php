<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'user_id',
        'cliente_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
    
    public function ProdutoVenda(){
        return $this->hasMany(ProdutoVenda::class);
    }
    
    public function parcela(){
        return $this->hasMany(Parcela::class);
    }
}
