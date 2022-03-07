<?php

class Game extends Product
{
    public string $Genre;
    
    public function getGenre(): string
    {
        return $this->Genre;
    }

    public function setGenre(string $Genre): void
    {
        $this->Genre = $Genre;
    }



}