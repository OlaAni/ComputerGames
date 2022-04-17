<?php

require_once "../autoload.php";
use PHPUnit\Framework\TestCase;
class ProductUnitTest extends TestCase
{

    public function testGetId()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getId(),1);
    }


    public function testGetName()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getName(),"DogWatch");

    }

    public function testGetImage()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getImage(),"DogWatch.png");
    }

    public function testGetDescription()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getDescription(),"Hacking Game");
    }

    public function testGetPrice()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getPrice(),50);
    }

    public function testGetType()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getType(),1);
    }

    public function testGetRarity()
    {
        $prod = new Product(1);
        $this->assertEquals($prod->getRarity(),"VERY");
    }
    
}
