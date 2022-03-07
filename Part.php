<?php

class Part extends Product
{
    public string $PartType;


    public function getPartType(): string
    {
        return $this->PartType;
    }

    public function setPartType(string $PartType): void
    {
        $this->PartType = $PartType;
    }



}