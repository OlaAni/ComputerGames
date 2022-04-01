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

require "../autoload.php";
$test = array();
for($i=1;$i<=4;$i++)
{
    $prod = new Product($i);
    array_push($test,$prod);
}

?>
<h2>Update Products</h2>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Genre/Part</th>
        <th>Image</th>
        <th>Descrition</th>
        <th>rarity</th>
        <th>type</th>
        <th>Edit</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($test as $row) : ?>
        <tr>
            <td><?php echo $row->getID(); ?></td>
            <td><?php echo $row->getName(); ?></td>
            <td><?php echo $row->getPrice() ; ?></td>
            <td><?php
                if($row->getType()==0)
                {
                    $row = new Part($row->getID());
                    echo $row->getPartType();
                }
                else
                {
                    $row = new Game($row->getID());
                    echo $row->getGenre();

                }
                ?></td>
            <td><?php echo $row->getImage();?></td>
            <td><?php echo $row->getDescription(); ?></td>
            <td><?php echo $row->getRarity(); ?> </td>
            <td><?php echo $row->getType(); ?> </td>
            <td><a href="update-single.php?idProduct=<?php echo $row->getID();
                ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php require 'templates/footer.php';?>
