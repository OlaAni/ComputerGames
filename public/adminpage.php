<?php require 'templates/headerlogged.php';  ?>
<?php


try {
    require "../src/functions.php";
    $pdo = get_connections();
    $sql = "SELECT * FROM product";
    $pdo = get_connections();
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}

?>
<h2>Update Products</h2>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Genre</th>
        <th>Image</th>
        <th>Descrition</th>
        <th>rarity</th>
        <th>type</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo $row["idProduct"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["price"] ; ?></td>
            <td><?php echo $row["genre"]; ?></td>
            <td><?php echo $row["image"];?></td>
            <td><?php echo $row["description"]; ?></td>
            <td><?php echo $row["rarity"]; ?> </td>
            <td><?php echo $row["type"]; ?> </td>
            <td><a href="update-single.php?idProduct=<?php echo $row["idProduct"];
                ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require 'templates/footer.php';?>
