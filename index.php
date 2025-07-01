<?php
require_once 'vendor/autoload.php';

use Borges\Biblioteca\Livro;
use Borges\Biblioteca\Estante;

echo 'Sistema de Biblioteca Iniciado! <br>';

$livro1 = new Livro('J.K. Rowling', 'Harry Potter e a Pedra Filosofal');
$livro2 = new Livro('J.R.R. Tolkien', 'O Senhor dos Anéis');

$estante = new Estante();

var_dump($estante);
