<?php
require_once "Product.php";
class  Sale
{
    private String $paymentDetails;
    private Customer $customer;
    private Cart $cart;


    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function setCart(Cart $cart): void
    {
        $this->cart = $cart;
    }


    function showCartDetails():void
    {
       $this->cart->setProductNames();
    }

    //get unique sale id
    function getUniqueId($r)
    {
        $pdo = get_connections();
        $query = 'SELECT uniqueSaleId FROM sale WHERE uniqueSaleId ='.$r;
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @param $price
     * @return mixed
     * submits price and customerid to the database
     */
    function Submit($price): mixed
    {
        $pdo = get_connections();
        $cartItems = $_SESSION["cart"];
        $r = rand(0, 21474836);
        while($this->getUniqueId($r) == true) {
            $r = rand(0, 21474836);
        }
        foreach ($cartItems as $idt => $quantity)
        {
            $query = 'INSERT INTO sale(fullPrice,Customer_idCustomer,Product_idProduct,amount,uniqueSaleId) VALUES (:price,:id,:cartId,:quantity,:un)';
            $stmt = $pdo->prepare($query);
            $id = $_SESSION["id"];

            $product = new Product($idt);
            $c = $product->getId();
            $stmt->bindParam(':cartId', $c);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':un', $r);
            $stmt->execute();

        }
        return $stmt->fetch();
    }



}