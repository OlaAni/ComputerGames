<?php
class Trade
{
    private double $discount;

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    public function CheckProduct():void
    {

    }

    public function calDiscount($rarity):double
    {
        if($rarity = "Very")
        {
            return 0.10;
        }
        elseif ($rarity = "Common")
        {
            return 0.01;
        }

    }
}