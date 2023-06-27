<?php

require_once 'vendor/autoload.php';

use App\Model\Produto;
use App\Model\ProdutoDao;

$produto = new Produto();
$produto->setId(3);
$produto->setNome("Mesa");
$produto->setDescricao('Longa');

// var_dump($produto);

$produtoDao = new ProdutoDao();

// $produtoDao->create($produto);

// $produtoDao->update($produto);

$produtoDao->delete(3);

$produtoDao->read();

foreach($produtoDao->read() as $produto) {
    echo "{$produto['nome']} <br> {$produto['descricao']} <hr>";
}