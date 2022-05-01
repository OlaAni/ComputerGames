<?php
require '../autoload.php';

?>


<?php require 'templates/headerlogged.php';  ?>
<?php

$user = new Customer($_SESSION['id']);
$product = new Game(1);

?>
<h1 class="trade">Game of the Month</h1>
<h2 class="trade"><?php echo $product->getName(); ?></h2>
<h3 class="trade"><?php echo $product->getRarity(); ?></h3>
<?php
if (isset($_POST['submit'])) {
    $trade = new Trade();
    $trade->writeTrade();
}

?>





<form method="post">
    <div class="tradeForm">
        <p>Please fill in this form to get a Discount of next purchase.</p>
        <hr>
        <label for="name">Trade In Type:</label>
        <input type="text" class="formData" placeholder="Enter Item Type" name="tradeamo" id="tradeamo">
        <label for="name">Trade In Name:</label>
        <input type="text" class="formData" placeholder="Enter Item Name" name="tradeName" id="tradeName">
        <label for="name">Expected Value:</label>
        <input type="text" class="formData" placeholder="Enter Expected Value" name="tradeValue" id="tradeValue">
        <input type="submit" class="tradeButton" name="submit" value="Submit">
        <hr>
    </div>
</form>
<?php require 'templates/footer.php';?>
