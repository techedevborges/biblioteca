<?php
require_once 'vendor/autoload.php';

use Borges\Biblioteca\Livro;
use Borges\Biblioteca\Estante;
use Borges\Biblioteca\Aluno;
use Borges\Biblioteca\Bibliotecario;
use Borges\Biblioteca\Professor;
use Borges\Biblioteca\Visitante;

echo 'Sistema de Biblioteca Iniciado! <br>';

$livro1 = new Livro('J.K. Rowling', 'Harry Potter e a Pedra Filosofal');
$livro2 = new Livro('J.R.R. Tolkien', 'O Senhor dos Anéis');
$livro3 = new Livro('George Orwell', '1984');
$livro4 = new Livro('J.K. Rowling', 'Harry Potter e a Câmara Secreta');
$livro5 = new Livro('J.K. Rowling', 'Harry Potter e o Prisioneiro de Azkaban');
$livro6 = new Livro('J.K. Rowling', 'Harry Potter e o Cálice de Fogo');


$estante = new Estante();

$estante->adicionarLivro($livro1);
$estante->adicionarLivro($livro2);
$estante->adicionarLivro($livro3);
$estante->adicionarLivro($livro4);
$estante->adicionarLivro($livro5);
$estante->adicionarLivro($livro6);


$aluno = new Aluno('Borges');
$aluno1 = new Aluno('Borges1');
$aluno->adicionarLivroEmprestado($livro1);

if ($aluno->podePegarEmprestado()) {
    echo 'O aluno pode pegar mais livros emprestados.<  br>';
    $aluno->adicionarLivroEmprestado($livro1);
    $livro1->marcarComoEmprestado();
    $estante->removerLivro($livro1);
    echo 'Livro emprestado: ' . $livro1->getTitulo() . '<br>';
} else {
    echo 'O aluno não pode pegar mais livros emprestados.<br>';
}

$professor = new Professor('Professor Borges');
$professor->adicionarLivroEmprestado($livro2);
$professor->adicionarLivroEmprestado($livro3);
$professor->adicionarLivroEmprestado($livro4);

// $visitante = new Visitante('Victor');
// $visitante->adicionarLivroEmprestado($livro4);

try {
    Bibliotecario::emprestarLivro($aluno, $livro1, $estante);
    echo 'Livro ' . $livro1->getTitulo() .   'emprestado com sucesso ' . $aluno->getNome() . '<br>';
    Bibliotecario::devolverLivro($aluno, $livro1, $estante);
    echo 'Livro ' . $livro1->getTitulo() . ' devolvido com sucesso por ' . $aluno->getNome() . '<br>';
} catch (\Exception $e) {
    echo 'Erro ao emprestar livro: ' . $e->getMessage() . '<br>';
}

// echo '<pre>';
// var_dump($aluno->podePegarEmprestado());
// var_dump($professor->podePegarEmprestado());
// var_dump($visitante->podePegarEmprestado());
