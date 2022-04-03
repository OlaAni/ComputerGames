<?php
require_once "functions.php";

/**
 * Extends User
 * Controls register and customer object
 * getter and setters
 */
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

    /**
     * writes to the database and checks if email is already in use
     */
    function Register():void
    {
        $pdo = get_connections();
        if (isset($_POST['submit'])) {
            $check = checkIfUserExists($_POST['email']);
            if ($check) {
                echo "EMAIL IS NOT IN USE";
            } else {
                try {
                    $new_user = array(
                        "name" => $_POST['name'],
                        "email" => $_POST['email'],
                        "password" => $_POST['password'],
                        "location" => $_POST['location'],
                        "favgenre" => 'Blank',
                        "tradeamo" => 0,
                        "employee" => 'false',
                    );
                    $sql = "INSERT INTO user (" . implode(', ', array_keys($new_user)) . ")
            values (:" . implode(', :', array_keys($new_user)) . ")";

                    $statement = $pdo->prepare($sql);
                    $statement->execute($new_user);
                } catch (PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
                header("Location: loginpage.php");

            }
        }
    }



    public function showDetails(): void
    {
        echo parent::showDetails()." Age is ".$this->age."Favourite Genre is ".$this->favGenre."</br>";
    }
}