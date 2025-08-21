<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Schema::disableForeignKeyConstraints();
        Produto::truncate();
        Schema::enableForeignKeyConstraints();

        Produto::create([
            'nome'=> 'Camiseta Branca Básica',
            'preco'=> 79.90,
            'tamanho'=> 'M',
            'descricao'=> 'Uma camiseta de algodão confortável para o dia a dia.',
            'quantidade'=> 50,
            'ativo'=> true
        ]);

        Produto::create([
            'nome' => 'Calça Jeans Slim',
            'preco' => 189.90,
            'tamanho' => 'G',
            'descricao' => 'Calça jeans com lavagem moderna e corte slim.',
            'quantidade' => 30,
            'ativo' => true,
        ]);

        Produto::create([
            'nome' => 'Macacão',
            'preco' => 129.90,
            'tamanho' => 'M',
            'descricao' => 'Macacão jeans corte plus.',
            'quantidade' => 80,
            'ativo' => true,
        ]);
    }
}
