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
        echo $this->customer->getName()." must pay for these products ". $this->cart->setProductNames();
    }

    function Submit():void
    {

    }
}