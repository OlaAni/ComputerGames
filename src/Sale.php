<?php
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
    function Submit($price,$cartItems): mixed
    {
        $pdo = get_connections();
        //$query = 'INSERT INTO sale(fullPrice,Customer_idCustomer) VALUES (:price,:id)';
        foreach($cartItems as $cartId => $quantity)
        {
            $query = 'INSERT INTO sale(fullPrice,Customer_idCustomer,Product_idProduct) VALUES (:price,:id,:cartId)';
        }
        $stmt = $pdo->prepare($query);
        $id = $_SESSION["id"];
        $stmt->bindParam(':cartId',$cartId);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':id',$id);
        $stmt->execute();

        return $stmt->fetch();
    }
}