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
}
