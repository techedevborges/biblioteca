<?php

namespace Borges\Biblioteca;

use Borges\Biblioteca\Usuario;

class Visitante extends Usuario
{
    private const MAX_LIVROS_EMPRESTADOS = 0;

    public function podePegarEmprestado(): bool
    {
        if (count($this->livrosEmprestados) < self::MAX_LIVROS_EMPRESTADOS) {
            return true;
        }
        return count($this->livrosEmprestados) < self::MAX_LIVROS_EMPRESTADOS;
    }
}
