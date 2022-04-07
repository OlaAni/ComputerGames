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

    /**
     * @param $price
     * @return mixed
     * submits price and customerid to the database
     */
    function Submit($price): mixed
    {
        $pdo = get_connections();
        $cartItems = $_SESSION["cart"];
        foreach($cartItems as $idt => $quantity){
            $query = 'INSERT INTO sale(fullPrice,Customer_idCustomer,Product_idProduct,amount) VALUES (:price,:id,:cartId,:quantitiy)';
            $stmt = $pdo->prepare($query);
            $id = $_SESSION["id"];

            $product = new Product($idt);
            $c = $product->getId();

            $stmt->bindParam(':cartId',$c);
            $stmt->bindParam(':quantitiy',$quantity);
            $stmt->bindParam(':price',$price);
            $stmt->bindParam(':id',$id);
            $stmt->execute();

        }
        return $stmt->fetch();


    }
}