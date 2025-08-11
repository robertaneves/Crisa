<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $fillable = [
        'cep',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
