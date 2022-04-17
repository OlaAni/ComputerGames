<?php
require_once "../autoload.php";

use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testGetName()
    {
        $user = new User(101);
        $this->assertEquals($user->getName(),'Olamide');

    }

    public function testGetPassword()
    {
        $user = new User(101);
        $this->assertEquals($user->getPassword(),'pass');
    }

    public function testGetId()
    {
        $user = new User(101);
        $this->assertEquals($user->getId(),101);
    }

    public function testGetEmail()
    {
        $user = new User(101);
        $this->assertEquals($user->getEmail(),'ola@gmail.com');
    }

    public function testGetEmployee()
    {
        $user = new User(101);
        $this->assertEquals($user->getEmployee(),"false");
    }
}
