<?php

class Game extends Product
{
    public string $genre;

    public function __construct($name, $price,$genre)
    {
        parent::__construct($name, $price);
        $this->genre = $genre;

    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }



}