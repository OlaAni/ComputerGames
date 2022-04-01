<?php
class Cart
{
    private float $fullPrice = 0;
    private $products = array();
    private $qauntity = 0;
    protected Trade $trade;

    /**
     * @param Trade $trade
     */
    public function setTrade(Trade $trade): void
    {
        $this->trade = $trade;
    }

    public function setNewPrice(float $fullPrice): void
    {
        $discount = $fullPrice * $this->trade->getDiscount();
        $discountPrice = $fullPrice - $discount;
        $this->fullPrice = $discountPrice;
    }



    public function getFullPrice(): float
    {
        return $this->fullPrice;
    }

    public function calcFullPrice():float
    {
        foreach ($this->products as $product)
        {
            $this->fullPrice = $product->getPrice() + $this->fullPrice;
        }

        return $this->fullPrice;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }



    public function setProductNames():void
    {
        $i = 0;

        $arr = array();

        foreach ($this->products as $product)
        {
            array_push($arr,$product->getName());
        }

        foreach ($arr as $ar)
        {
            $i++;

            echo "Product".$i.": ".$ar."</br>";
        }
    }

}