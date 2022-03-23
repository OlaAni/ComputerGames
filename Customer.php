<?php
require_once "src/functions.php";
class Customer extends User
{
    private String $favGenre;
    private int $id;
    private int $age;

    public function __construct($name, $email, $password,$age)
    {
        parent::__construct($name, $email, $password);
        $this->age = $age;

    }

    function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getFavGenre(): string
    {
        return $this->favGenre;
    }


    public function setFavGenre(string $favGenre): void
    {
        $this->favGenre = $favGenre;
    }

    function Update():void
    {

    }

    function Register():void
    {
        //echo $_POST['name'];
        set_user();
        header("Location: loginpage.php");
    }

    public function showDetails(): void
    {
        echo parent::showDetails()." Age is ".$this->age."Favourite Genre is ".$this->favGenre."</br>";
    }
}