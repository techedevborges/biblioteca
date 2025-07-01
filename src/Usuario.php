<?php

namespace Borges\Biblioteca;

class Usuario
{
    private string $nome;
    private string $tipo;
    private array $livrosEmprestados = [];

    public function __construct(string $nome, string $tipo = 'aluno')
    {
        $this->nome = $nome;
        $this->tipo = $tipo;
    }

    public function podePegarEmprestado(): bool
    {
        if ($this->tipo == 'professor' && count($this->livrosEmprestados) < 3) {
            return true;
        }

        if ($this->tipo == 'aluno' && count($this->livrosEmprestados) < 1) {
            return true;
        }

        return false;
    }

    public function adicionarLivroEmprestado(Livro $livro): void
    {
        $this->livrosEmprestados[] = $livro;
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
