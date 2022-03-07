<?php
class Cart
{
    private String $fullPrice;
    //private Product[] $product;

    public function getFullPrice(): string
    {
        return $this->fullPrice;
    }

    public function setFullPrice(string $fullPrice): void
    {
        $this->fullPrice = $fullPrice;
    }


}