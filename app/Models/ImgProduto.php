<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImgProduto extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada com o model.
     * (Opcional neste caso, pois o Laravel deduz 'img_produtos' de 'ImgProduto')
     *
     * @var string
     */
    protected $table = 'img_produtos';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'produto_id',
        'pasta_imagem',
        'principal',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'principal' => 'boolean',
    ];

    /**
     * Define o relacionamento inverso de "Pertence a" com Produto.
     * Uma imagem pertence a um único produto.
     */
    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}