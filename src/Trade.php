<?php
class Trade
{
    private float $discount;
    private Customer $customer;

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
        elseif($rarityType ==  'VERY')
        {
            $this->setDiscount(0.5);
        }
        else
        {
            $this->setDiscount(0);
        }


    }



    public function CheckProduct():void
    {

    }
}