<?php

class Game extends Product
{
    public string $genre;


    public function __construct($id, $name, $price,$genre,$rarity)
    {
        parent::__construct($id);
        $this->setGenre($genre);
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): void
    {
        $game = $this->getProduct();
        $this->genre = $game["genre"];
    }


    public function showDetails(): void
    {
        parent::showDetails()." Genre is ".$this->genre;
    }


}