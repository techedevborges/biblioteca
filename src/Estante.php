<?php

namespace Borges\Biblioteca;

class Estante
{
    // Array privado de Livros
    private array $livros = [];

    public function adicionarLivro(Livro $livro): void
    {
        $this->livros[] = $livro;
    }

    public function removerLivro(Livro $livro): void
    {
        $this->livros = array_filter(
            $this->livros,
            // fn($livroAtual) => $livroAtual !== $livro
            function ($livroAtual) use ($livro) {
                echo 'Livro Atual: ' . $livroAtual->getTitulo();
                if ($livroAtual === $livro) {
                    echo ' - Livro removido!';
                }
                echo '<br>';
                return $livroAtual !== $livro;
            }
        );
    }

    public function buscarLivroPorTitulo(string $titulo): ?Livro
    {
        foreach ($this->livros as $livro) {
            if (str_contains(strtolower($livro->getTitulo()), strtolower($titulo))) {
                return $livro;
            }
        }
        return null;
    }

    public function listarLivrosDisponiveis(): array
    {
        return array_filter($this->livros, function ($livroAtual) {
            return $livroAtual->estaDisponivel();
        });
    }
}
