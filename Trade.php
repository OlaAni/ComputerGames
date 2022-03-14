<?php
class Trade
{
    private float $discount;

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


    public function calDiscount($rarity):void
    {
        if (strcmp($rarity, "Common") == 0)
        {
            $this->setDiscount(0.01);
        }
        elseif(strcmp($rarity, "Very") == 0)
        {
            $this->setDiscount(0.5);
        }
        else
        {
            $this->setDiscount(0);
        }

    }



    public function CheckProduct():void
    {

    }
}