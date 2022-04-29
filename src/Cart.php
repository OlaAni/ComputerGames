<?php

/**
 * Class cart,calculates fullprice and sets trade amounts and return the name of the products
 */
class Cart
{
    private float $fullPrice = 0;
    private $products = array();
    private Customer $customer;

    /**
     * @param Trade $trade
     */

    public function setNewPrice(float $fullPrice): void
    {
        $discount = $fullPrice * $this->customer->getDiscountAmount();
        $discountPrice = $fullPrice - $discount;
        $this->fullPrice = $discountPrice;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
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