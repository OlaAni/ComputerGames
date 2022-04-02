<?php require 'templates/headerlogged.php';  ?>

<?php

if (isset($_POST['submit'])) {
    try {
        require_once '../src/functions.php';
        $product =[
            "idProduct" => $_POST['idProduct'],
            "name" => $_POST['name'],
            "price" => $_POST['price'],
            "genre" => $_POST['genre'],
            "part" => $_POST['part'],
            "image" => $_POST['image'],
            "description" => $_POST['description'],
            "rarity" => $_POST['rarity'],
            "type" => $_POST['type']
        ];
        $sql = "UPDATE product SET idProduct = :idProduct, name = :name, price = :price, 
                   genre = :genre, part = :part, image = :image,
                   description = :description, rarity = :rarity, type = :type WHERE idProduct = :idProduct";
        $pdo = get_connections();
        $statement = $pdo->prepare($sql);
        $statement->execute($product);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['idProduct'])) {
    try {
        require_once '../src/functions.php';
        $pdo = get_connections();
        $idProduct = $_GET['idProduct'];
        $sql = "SELECT * FROM product WHERE idProduct = :idProduct";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':idProduct', $idProduct);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
else {
    echo "Something went wrong!tyty";
    exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo $_POST['name']; ?> successfully updated.
<?php endif; ?>
<h2>Edit a Product</h2>
<form method="post">
    <?php foreach ($product as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
        ?>" value="<?php echo $value; ?>" <?php echo ($key === 'idProduct' ?
            'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
