<?php
require_once "lib/functions.php";
abstract class User
{
    private String $name;
    private String $email;
    private String $password;
    private bool $employee = false;
    private int $id;


    public function __construct($name,$email,$password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    function getUser($id)
    {
        $pdo = get_connections();
        $query = 'SELECT * FROM user WHERE userID = :idVal';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('idVal',$id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getPassword(): string
    {
        return $this->password;
    }


    public function setName(string $name): void
    {
        $user = $this->getName();
        $this->name = $user['name'];
    }

    public function setEmail(string $email): void
    {
        $user = $this->getEmail();
        $this->email = $user['email'];
    }

    public function setPassword(string $password): void
    {
        $user = $this->getPassword();
        $this->password = $user['password'];
    }

    /**
     * @param bool $employee
     */
    public function setEmployee(bool $employee): void
    {
        $this->employee = $employee;
    }


    /**
     * @return bool
     */
    public function isEmployee(): bool
    {
        return $this->employee;
    }


    public function Login(): void
    {
        //Login in User if statement for admin and customer
        if($this->employee)
        {
            //admin login
        }
        else
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
            $user1 = checkCred($email, $password);
            //var_dump($user1);
            //var_dump($_SESSION);


            if ($user1) {
                header("Location: index.php");
            }
        }
    }

    public function showDetails(): void
    {
        if($this->employee)
        {
            echo $this->getName() ." employee status is true</br>";
        }
        else
        {
            echo $this->getName() ." employee status is false</br>";

        }

    }
}