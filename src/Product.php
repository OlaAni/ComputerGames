<?php

require_once "functions.php";
class Product
{
    private string $name;
    private float $price;
    private String $rarity;
    private int $id;
    private String $description;
    private String $image;
    private int $type;


    function get_products($limit = null)
    {
        $pdo = get_connections();

        $query = 'SELECT * FROM product';
        if($limit)
        {
            $query = $query.' LIMIT :resultLimit';
        }
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('resultLimit',$limit, PDO::PARAM_INT);
        $stmt->execute();
        $proudcts = $stmt->fetchAll();

        return $proudcts;
    }


    public function __construct($id)
    {
        $this->setId($id);
        $this->setName();
        $this->setPrice();
        $this->setRarity();
        $this->setDescription();
        $this->setImage();
        $this->setType();
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
    public function setName(): void
    {
        $product = $this->getProduct();
        $this->name = $product['name'];
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(): void
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
     * @return String
     */
    public function getRarity(): string
    {
        return $this->rarity;
    }

    /**
     * @param String $rarity
     */
    public function setRarity(): void
    {
        $product = $this->getProduct();
        $this->rarity = $product['rarity'];

    }

    /**
     * @return String
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param String $description
     */
    public function setDescription(): void
    {
        $product = $this->getProduct();
        $this->description = $product['description'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @param String $image
     */
    public function setImage(): void
    {
        $product = $this->getProduct();
        $this->image = $product['image'];    }

    /**
     * @return String
     */
    public function getImage(): string
    {
        return $this->image;
    }


    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(): void
    {
        $product = $this->getProduct();
        $this->type = $product['type'];
    }

    public function showDetails(): void
    {
        echo "Product: ".$this->getName()." is €".$this->price."</br>";
    }

    public function Search()
    {

    }


}