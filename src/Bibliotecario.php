<?php

namespace Borges\Biblioteca;

class Bibliotecario
{
    public static function emprestarLivro(Usuario $usuario, Livro $livro, Estante $estante): bool

    {
        echo "<hr>";
        if (!$livro->estaDisponivel()) {
            throw new \Exception("O livro não está disponivel");
            return false;
        }
        if (!$usuario->podePegarEmprestado()) {
            throw new \Exception("O usuario não pode pegar mais livros emprestados");
            return false;
        }
        if (!$estante->buscarLivroPorTitulo($livro->getTitulo())) {
            throw new \Exception("O livro não está na estante");
            return false;
        }

        $livro->marcarComoEmprestado();
        $usuario->adicionarLivroEmprestado($livro);
        $estante->removerLivro($livro);
        return true;
    }

    public static function devolverLivro(Usuario $usuario, Livro $livro, Estante $estante): bool
    {
        // O livro tem que estar com o usuario
        // O livro tem que ser colocado na estante
        // O livro tem que passar a estar disponivel
        if ($livro->estaDisponivel()) {
            throw new \Exception("O livro já está disponível");
            return false;
        }
        if ($estante->verificarLivro($livro)) {
            throw new \Exception("O livro já está na estante");
            return false;
        }
        if (!$usuario->podePegarEmprestado()) {
            throw new \Exception("O usuario não pode pegar mais livros emprestados");
            return false;
        }
        if (!in_array($livro, $usuario->listarLivrosEmprestados())) {
            throw new \Exception("O livro não está com o usuario");
            return false;
        }

        $usuario->removerLivroEmprestado($livro);
        $estante->adicionarLivro($livro);
        $livro->marcarComoDisponivel();
        return true;
    }
}
