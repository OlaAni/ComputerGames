<?php

require_once "../autoload.php";
use PHPUnit\Framework\TestCase;
class ProductUnitTest extends TestCase
{

    public function testGetId()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getId(),"DogWatch");
    }


    public function testGetName()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getName(),"DogWatch");

    }

    public function testGetImage()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getImage(),"DogWatch");
    }

    public function testGetDescription()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getDescription(),"DogWatch");
    }

    public function testGetPrice()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getPrice(),"DogWatch");
    }

    public function testGetType()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getType(),"DogWatch");
    }

    public function testGetRarity()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getRarity(),"DogWatch");
    }
}
