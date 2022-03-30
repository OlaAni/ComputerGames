<?php
require_once "src/functions.php";
class Customer extends User
{
    private String $favGenre;
    private int $age;
    private float $discountAmount;

    public function __construct($id)
    {
        parent::__construct($id);
        $this->setFavGenre();
        $this->setDiscountAmount();
        $this->setAge();
    }

    /**
     * @param int $age
     */
    public function setAge(): void
    {
        $user = $this->getUser();
        $this->age = $user['age'];
    }
    /**
     * @param String $favGenre
     */
    public function setFavGenre(): void
    {
        $user = $this->getUser();
        $this->favGenre = $user['favgenre'];
    }

    /**
     * @param int $discountAmount
     */
    public function setDiscountAmount(): void
    {
        $user = $this->getUser();
        $this->discountAmount = $user['tradeamo'];
    }

    /**
     * @return float
     */
    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }

    /**
     * @return String
     */
    public function getFavGenre(): string
    {
        return $this->favGenre;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
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