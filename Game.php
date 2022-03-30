<?php

class Game extends Product
{
    public string $genre;


    public function __construct($id)
    {
        parent::__construct($id);
        $this->setGenre();
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(): void
    {
        $game = $this->getProduct();
        $this->genre = $game["genre"];
    }


    public function showDetails(): void
    {
        parent::showDetails()." Genre is ".$this->genre;
    }


}