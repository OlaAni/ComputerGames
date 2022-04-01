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


    public function getShoppingCart()
    {
        $cartItems = [];
        if (isset($_SESSION['cart'])){
            $cartItems = $_SESSION['cart'];
        }
        return $cartItems;

    }

    function addItemToCart($id)
    {
        $cartItems = $this->getShoppingCart();
        $cartItems[$id] = $id;
        $_SESSION['cart'] = $cartItems;
    }

    function removeItemFromCart($id)
    {
        $cartItems = $this->getShoppingCart();
        unset($cartItems[$id]);
        $_SESSION['cart'] = $cartItems;
    }

    function getQuantity($id,$cart)
    {
        if(isset($cart[$id]))
        {
            return $cart[$id];
        }
        else
        {
            return 0;
        }
    }

    function increaseCartQuantity($id)
    {
        $cartItems = $this->getShoppingCart();
        $quantity = $this->getQuantity($id, $cartItems);
        $newQuantity = $quantity;
        $cartItems[$id] = $newQuantity;

        $_SESSION['cart'] = $cartItems;
    }

}