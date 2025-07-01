<?php

namespace Borges\Biblioteca;

abstract class Usuario
{
    protected string $nome;
    protected array $livrosEmprestados = [];

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    abstract function podePegarEmprestado(): bool;

    public function adicionarLivroEmprestado(Livro $livro): void
    {
        if ($this->podePegarEmprestado()) {
            $this->livrosEmprestados[] = $livro;
        } else {
            throw new \Exception('O usuário não pode pegar livros emprestados.');
        }
    }

    public function removerLivroEmprestado(Livro $livro): void
    {
        $this->livrosEmprestados = array_filter(
            $this->livrosEmprestados,
            fn($livroAtual) => $livroAtual !== $livro
        );
    }

    public function listarLivrosEmprestados(): array
    {
        return $this->livrosEmprestados;
    }
}
