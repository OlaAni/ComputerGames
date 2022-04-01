<?php
require '../autoload.php';

?>


<?php require 'templates/headerlogged.php';  ?>
<?php

$user = new Customer($_SESSION['id']);
$product = new Game(1);

?>
<h1>Game of the Month</h1>
<h2><?php echo $product->getName(); ?></h2>
<h3><?php echo $product->getRarity(); ?></h3>
<p>Trade in to get a percent off on your profile</p>
<?php
if (isset($_POST['submit'])) {
    $pdo = get_connections();
    $query = 'SELECT * FROM product WHERE name = :name';
    $name = $_POST['tradeName'];
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('name', $name);
    $stmt->execute();
    $result = $stmt->fetch();
    if($result) {
        $i = intval($result["idProduct"]);
        $prod = new Product($i);
        $trade = new Trade();

        try {
            require_once '../src/functions.php';
            $product = [

                "tradeamo" => $_POST['tradeamo'],
                "tradeName" => $_POST['tradeName'],
                "tradeValue" => $_POST['tradeValue'],
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
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
    else
    {
        echo "No Discount";
    }
}

?>





<form method="post">

    <label for="name">Trade In Type:</label>
    <input type="text" name="tradeamo" id="tradeamo">
    <label for="name">Trade In Name:</label>
    <input type="text" name="tradeName" id="tradeName">
    <label for="name">Expected Value:</label>
    <input type="text" name="tradeValue" id="tradeValue">
    <input type="submit" name="submit" value="Submit">
</form>
<?php require 'templates/footer.php';?>
