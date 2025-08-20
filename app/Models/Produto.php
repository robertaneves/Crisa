<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada com o model.
     *
     * @var string
     */
    protected $table = 'produto';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'preco',
        'tamanho',
        'descricao',
        'quantidade', 
        'ativo',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'float',
    ];

    /**
     * Define o relacionamento de Muitos para Muitos com Categoria.
     * Um produto pode pertencer a muitas categorias.
     */
    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categoria_de_produtos');
    }

    /**
     * Define o relacionamento de Um para Muitos com ImgProduto.
     * Um produto pode ter muitas imagens.
     */
    public function imagens(): HasMany
    {
        return $this->hasMany(ImgProduto::class);
    }
}