<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada com o model.
     *
     * @var string
     */
    protected $table = 'categoria';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tamanho',
        'descricao',
    ];
    
    /**
     * Define o relacionamento de Muitos para Muitos com Produto.
     * Uma categoria pode ter muitos produtos.
     */
    public function produtos(): BelongsToMany
    {
        return $this->belongsToMany(Produto::class, 'categoria_de_produtos');
        // O segundo argumento 'categoria_de_produtos' é o nome da sua tabela pivot
    }
}