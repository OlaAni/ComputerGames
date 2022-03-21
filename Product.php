<?php
require_once "lib/functions.php";
class Product
{
    private string $name;
    private float $price;
    private RarityType $rarity;
    private int $id;

    public function __construct($id,$name,$price)
    {
        $this->setId($id);
        $this->setName($name);
        $this->setPrice($price);
    }

    public function getProduct()
    {
        $pdo = get_connections();
        $query = 'SELECT * FROM product WHERE idProduct = :idVal';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('idVal', $this->id);
        $stmt->execute();

        return $stmt->fetch();
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $product = $this->getProduct();
        $this->name = $product['name'];
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $product = $this->getProduct();
        $this->price = $product['price'];
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    public function showDetails(): void
    {
        echo "Product: ".$this->getName()." is €".$this->price."</br>";
    }


}