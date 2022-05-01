<?php

/**
 * returns trade
 */
class Trade
{
    private float $discount;

    function getTrade()
    {
        $pdo = get_connections();
        $query = 'SELECT * FROM trade WHERE idTrade = :idTrade';

        $stmt = $pdo->prepare($query);
        $stmt->bindParam('idTrade', $this->id);
        $stmt->execute();

        return $stmt->fetch();
    }

    /**
     * @return float
     */
    public function getDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    /**
     * @param float $discount
     */
    public function setDiscount(float $discount): void
    {
        $this->discount = $discount;
    }
    public function calDiscount(String $rarityType):void
    {
        if ($rarityType == 'COMMON')
        {
            $this->setDiscount(0.01);
        }
        elseif($rarityType ==  'UNCOMMON')
        {
            $this->setDiscount(0.10);
        }
        elseif($rarityType ==  'VERY')
        {
            $this->setDiscount(0.5);
        }
        elseif($rarityType ==  'ULTRA')
        {
            $this->setDiscount(0.75);
        }
        else
        {
            $this->setDiscount(0);
        }


    }


    /**
     * @return Customer
     */
    public function writeTrade()
    {
        if (isset($_POST['submit'])) {
            $user = new Customer($_SESSION['id']);

            $pdo = get_connections();
            $query = 'SELECT * FROM product WHERE name = :name';
            $name = $_POST['tradeName'];
            $stmt = $pdo->prepare($query);
            $stmt->bindParam('name', $name);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result) {
                $i = intval($result["idProduct"]);
                $prod = new Product($i);
                $trade = new Trade();

                try {
                    require_once '../src/functions.php';
                    $product = [

                        "tradeamo" => clean($_POST['tradeamo']),
                        "tradeName" => clean($_POST['tradeName']),
                        "tradeValue" => clean($_POST['tradeValue']),
                    ];
                    $sql = sprintf(
                        "INSERT INTO %s (%s) values (%s)",
                        "trade",
                        implode(", ", array_keys($product)),
                        ":" . implode(", :", array_keys($product))
                    );

                    $sql1 = 'UPDATE user SET tradeamo = :tradeamo where idUser = ' . $user->getId();
                    $trade->calDiscount($prod->getRarity());
                    $tradeamo = $trade->getDiscount() + $user->getDiscountAmount();
                    $statement1 = $pdo->prepare($sql1);
                    $statement1->bindValue(':tradeamo', $tradeamo);
                    $statement1->execute();

                    $statement = $pdo->prepare($sql);
                    $statement->execute($product);
                    echo "Discount";
                } catch (PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
            } else {
                echo "No Discount";
            }
        }

    }
}