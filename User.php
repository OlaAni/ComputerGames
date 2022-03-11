<?php
abstract class User
{
    private String $name;
    private String $email;
    private String $password;
    private bool $employee = false;


    public function __construct($name,$email,$password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
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
            //show.php?id=<?php echo $game['id']
        }
    }

    public function showDetails(): void
    {
        if($this->employee)
        {
            echo $this->getName() ." employee status is true";
        }
        else
        {
            echo $this->getName() ." employee status is false";

        }

    }
}