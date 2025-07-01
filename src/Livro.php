<?php

namespace Borges\Biblioteca;

class Livro
{
    // Propriedades Privadas
    private bool $disponivel = false;


    // Construtor da classe
    public function __construct(private string $autor, private string $titulo)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
    }

    public function marcarComoEmprestado()
    {
        $this->disponivel = false;
    }

    public function marcarComoDisponivel()
    {
        $this->disponivel = true;
    }

    public function estaDisponivel(): bool
    {
        return $this->disponivel;
    }


    // Metodos Getters
    // Retorna o titulo do livro
    // Retorna o autor do livro
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function getAutor(): string
    {
        return $this->autor;
    }
}
