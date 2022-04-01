<?php
class Cart
{
    private float $fullPrice = 0;
    private $products = array();
    private $qauntity = 0;
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


    function getShoppingCart()
    {
        // default is empty shopping cart array
        $cartItems = [];
        if (isset($_SESSION['cart'])) {
            $cartItems = $_SESSION['cart'];
        }
        return $cartItems;
    }

    function addItemToCart($id)
    {
        $cartItems = getShoppingCart();
        $cartItems[$id] = 1;
        $_SESSION['cart'] = $cartItems;
    }


    function removeItemFromCart($id)
    {
        $cartItems = getShoppingCart();
        unset($cartItems[$id]);
        $_SESSION['cart'] = $cartItems;
    }

    function getQuantity($id, $cart)
    {
        if (isset($cart[$id])) {
            return $cart[$id];
        } else {
            return 0;
        }
    }

    function increaseCartQuantity($id)
    {
        $cartItems = getShoppingCart();
        $quantity = getQuantity($id, $cartItems);
        $newQuantity = $quantity + 1;
        $cartItems[$id] = $newQuantity;
        $_SESSION['cart'] = $cartItems;

    }


    function reduceCartQuantity($id)
    {
        $cartItems = getShoppingCart();
        $quantity = getQuantity($id, $cartItems);
        $newQuantity = $quantity - 1;
        if ($newQuantity < 1) {
            unset($cartItems[$id]);
        } else {
            $cartItems[$id] = $newQuantity;
        }
        $_SESSION['cart'] = $cartItems;
    }


    function displayCart()
    {
        $cartItems = getShoppingCart();
        if(!empty($cartItems))
        {
            require_once __DIR__.'/../public/cartpage.php';
        }
    }

}