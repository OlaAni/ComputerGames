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
            }
            else
            {
                if(strlen($_POST["password"])<3)
                {
                    //var_dump(strlen($_POST["password"]));
                    echo 'PASSWORD TOO SHORT';
                }
                else
                {
                    try {
                        $new_user = array(
                            "name" => clean($_POST['name']),
                            "email" => clean($_POST['email']),
                            "password" => clean($_POST['password']),
                            "location" => clean($_POST['location']),
                            "favgenre" => 'Blank',
                            "tradeamo" => 0,
                            "employee" => 'false',
                        );
                        $sql = "INSERT INTO user (" . implode(', ', array_keys($new_user)) . ")  values (:" . implode(', :', array_keys($new_user)) . ")";

                        $statement = $pdo->prepare($sql);
                        $statement->execute($new_user);
                    } catch (PDOException $error) {
                        echo $sql . "<br>" . $error->getMessage();
                    }
                    header("Location: loginpage.php");
                }
            }
        }
    }



    function updateUser()
    {
        if (isset($_POST['submit'])) {
            try {
                require_once '../src/functions.php';
                $pdo = get_connections();
                $idUser = $this->getId();

                $user =[
                    "name" => clean($_POST['name']),
                    "favgenre" => clean($_POST['favgenre'])
                ];
                $sql = "UPDATE user SET name = :name, favgenre = :favgenre WHERE idUser = ".$idUser;

                $statement = $pdo->prepare($sql);
                $statement->execute($user);
            } catch(PDOException $error) {
                echo $sql . "<br>" . $error->getMessage(). "<br>";
                echo "Something went wrong!";
            }
        }
    }
    public function showDetails(): void
    {
        echo parent::showDetails()." Age is ".$this->age."Favourite Genre is ".$this->favGenre."</br>";
    }
}