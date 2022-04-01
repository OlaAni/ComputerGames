<?php
//require '../src/functions.php';
require '../Test/autoload.php';

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
    try {
        require_once '../src/functions.php';
        $product =[
            "tradeamo" => $_POST['tradeamo'],
        ];
        $sql = "UPDATE user
 SET tradeamo = :tradeamo,
 WHERE idProduct = :idProduct";
        $pdo = get_connections();
        $statement = $pdo->prepare($sql);
        $statement->execute($product);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

?>

<form method="post">
    <label for="name">Trade In</label>
    <input type="text" name="name" id="name">
    <input type="submit" name="submit" value="Submit">
</form>
<?php require 'templates/footer.php';?>
