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
            'ativo'=> true,
            'imagem' => 'img/produtos/Camisa Branca.jpg'
        ]);

        Produto::create([
            'nome' => 'Calça Jeans Slim',
            'preco' => 189.90,
            'tamanho' => 'G',
            'descricao' => 'Calça jeans com lavagem moderna e corte slim.',
            'quantidade' => 30,
            'ativo' => true,
            'imagem' => 'img/produtos/Calça Jeans.webp'
        ]);

        Produto::create([
            'nome' => 'Macacão',
            'preco' => 129.90,
            'tamanho' => 'P',
            'descricao' => 'Macacão jeans corte plus.',
            'quantidade' => 80,
            'ativo' => true,
            'imagem' => 'img/produtos/Macacão Jeans.webp'
        ]);

        Produto::create([
            'nome' => 'Tênis Esportivo',
            'preco' => 249.90,
            'tamanho' => 'G1',
            'descricao' => 'Tênis leve e respirável para corridas e caminhadas.',
            'quantidade' => 60,
            'ativo' => true,
            'imagem' => 'img/produtos/Beyoncé Ivy Park Tênis.webp'
        ]);

        Produto::create([
            'nome' => 'Jaqueta de Couro',
            'preco' => 399.90,
            'tamanho' => 'GG',
            'descricao' => 'Jaqueta de couro sintético estilosa e durável.',
            'quantidade' => 20,
            'ativo' => true,
            'imagem' => 'img/produtos/Jaqueta De Couro.jpg'
        ]);

        // Produto::create([
        //     'nome' => 'Saia Midi',
        //     'preco' => 149.90,
        //     'tamanho' => 'P',
        //     'descricao' => 'Saia midi em tecido leve, ideal para ocasiões casuais.',
        //     'quantidade' => 40,
        //     'ativo' => true,
        // ]);

        // Produto::create([
        //     'nome' => 'Boné Preto',
        //     'preco' => 59.90,
        //     'tamanho' => 'G3',
        //     'descricao' => 'Boné ajustável em algodão com estilo clássico.',
        //     'quantidade' => 100,
        //     'ativo' => true,
        // ]);

        // Produto::create([
        //     'nome' => 'Relógio de Pulso',
        //     'preco' => 499.90,
        //     'tamanho' => 'Único',
        //     'descricao' => 'Relógio de pulso elegante, à prova d\'água até 50m.',
        //     'quantidade' => 15,
        //     'ativo' => true,
        //     'imagem' => 'img/produtos/Relógio.webp'
        // ]);

        // Produto::create([
        //     'nome' => 'Chinelo Slide',
        //     'preco' => 89.90,
        //     'tamanho' => 'M',
        //     'descricao' => 'Chinelo confortável, perfeito para o verão.',
        //     'quantidade' => 70,
        //     'ativo' => true,
        // ]);

        // Produto::create([
        //     'nome' => 'Mochila Escolar',
        //     'preco' => 159.90,
        //     'tamanho' => 'Único',
        //     'descricao' => 'Mochila resistente com compartimento para notebook.',
        //     'quantidade' => 35,
        //     'ativo' => true,
        // ]);
    }
}