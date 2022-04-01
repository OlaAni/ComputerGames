<?php
require_once "src/functions.php";
class User
{
    private String $name;
    private String $email;
    private String $password;
    private String $employee = "false";
    private int $id;


    public function __construct($id)
    {
        $this->setId($id);
        $this->setName();
        $this->setEmail();
        $this->setPassword();
        $this->setEmployee();
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    function getUser()
    {
        $pdo = get_connections();
        $query = 'SELECT * FROM user WHERE idUser = :idVal';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('idVal',$this->id);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * @param String $name
     */
    public function setName(): void
    {
        $user = $this->getUser();
        $this->name = $user['name'];
    }

    /**
     * @param String $email
     */
    public function setEmail(): void
    {
        $user = $this->getUser();
        $this->email = $user['email'];    }

    /**
     * @param bool $employee
     */
    public function setEmployee(): void
    {
        $user = $this->getUser();
        $this->employee = $user['employee'];    }


    /**
     * @param String $password
     */
    public function setPassword(): void
    {
        $user = $this->getUser();
        $this->password = $user['password'];
    }

    /**
     * @return String
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getEmployee(): string
    {
        return $this->employee;
    }

    function checkCred($email,$password)
    {
        $pdo = get_connections();
        $query = 'SELECT * FROM user WHERE email = :emailVal AND password = :passwordVal';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('emailVal', $email);

        $stmt->bindParam('passwordVal', $password);

        $stmt->execute();


        return $stmt->fetch();
    }


    public function Login(): void
    {
        //Login in User if statement for admin and customer
        if($this->getEmployee()=="true")
        {
            session_start();
            $_SESSION["employee"] = $this->getEmployee();
            header("Location: adminpage.php");

        }
        else
        {
            session_start();
            $_SESSION["employee"] = $this->getEmployee();

            header("Location: index.php");

        }
    }

    public function showDetails(): void
    {
        if($this->employee=="true")
        {
            echo $this->getName() ." employee status is true</br>";
        }
        else
        {
            echo $this->getName() ." employee status is false</br>";

        }

    }
}