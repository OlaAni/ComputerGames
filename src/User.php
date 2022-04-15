<?php
require_once "functions.php";
class User
{
    private string $name;
    private string $email;
    private string $password;
    private string $employee = "false";
    private int $id;


    /**
     * @param $id
     */
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
        $stmt->bindParam('idVal', $this->id);
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
        $this->email = $user['email'];
    }

    /**
     * @param bool $employee
     */
    public function setEmployee(): void
    {
        $user = $this->getUser();
        $this->employee = $user['employee'];
    }


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

    /**
     * @param $email
     * @param $password
     * @return mixed
     * checks credentials for the user
     */
    function checkCred($email, $password)
    {
        $pdo = get_connections();
        $query = 'SELECT * FROM user WHERE email = :emailVal AND password = :passwordVal';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('emailVal', $email);

        $stmt->bindParam('passwordVal', $password);

        $stmt->execute();


        return $stmt->fetch();
    }


    /**
     * login if admin is true heads to adminpage
     * if admin is false heads to index
     */
    public function Login(): void
    {
        session_start();
        $_SESSION["employee"] = $this->getEmployee();
        $_SESSION['Active'] = true;
        //Login in User if statement for admin and customer
        if ($this->getEmployee() == "true")
        {
            header("Location: adminpage.php");
        }
        else
        {
            header("Location: index.php");
        }
    }

    public function showDetails(): void
    {
        if ($this->employee == "true") {
            echo $this->getName() . " employee status is true</br>";
        } else {
            echo $this->getName() . " employee status is false</br>";

        }

    }

    /**
     * returns search and returns product or no product
     */
    public function Search()
    {

        if (isset($_POST['submit'])) {

            $pdo = get_connections();
            $query = 'SELECT * FROM product WHERE name = :name';
            $name = $_POST['search'];
            $stmt = $pdo->prepare($query);
            $stmt->bindParam('name', $name);
            $stmt->execute();

            $result = $stmt->fetch();
        }

        if (isset($_POST['submit']))
        {
            if ($result) {
                $i = intval($result["idProduct"]);

                var_dump($result);
                header('Location: show.php?id='.$i);
            }
            else
            {
                header("Location: noProduct.php");
            }
        }
    }
}