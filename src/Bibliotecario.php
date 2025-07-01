<?php

namespace Borges\Biblioteca;

class Bibliotecario
{
    public function emprestarLivro(Usuario $usuario, Livro $livro, Estante $estante): bool

    {
        echo "<hr>";
        if (!$livro->estaDisponivel()) {
            echo "<br>Livro já está emprestado.<br>";
            return false;
        }
        if (!$usuario->podePegarEmprestado()) {
            echo "<br>Usuário não pode pegar livros emprestados.<br>";
            return false;
        }
        if (!$estante->buscarLivroPorTitulo($livro->getTitulo())) {
            echo "<br>Livro não encontrado na estante.<br>";
            return false;
        }

        $livro->marcarComoEmprestado();
        $usuario->adicionarLivroEmprestado($livro);
        $estante->removerLivro($livro);
        echo '<br>Livro emprestado com sucesso!<br> <hr>';


        return true;
    }

    public function devolverLivro(Usuario $usuario, Livro $livro, Estante $estante): bool
    {
        // O livro tem que estar com o usuario
        // O livro tem que ser colocado na estante
        // O livro tem que passar a estar disponivel
        if ($livro->estaDisponivel()) {
            echo "<br>Livro já está disponível na estante.<br>";
            return false;
        }
        if ($estante->buscarLivroPorTitulo($livro->getTitulo())) {
            echo "<br>Livro já está na estante.<br>";
            return false;
        }

        $usuario->removerLivroEmprestado($livro);
        $estante->adicionarLivro($livro);
        $livro->marcarComoDisponivel();
        echo "<br>Livro devolvido com sucesso!<br>";
        return true;
    }
}
