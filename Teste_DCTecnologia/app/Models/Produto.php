<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'name',
        'valor',
    ];

    public function vandas(){
        return $this->hasMany(ProdutoVenda::class);
    }
}
