<?php require 'templates/headerlogged.php';  ?>

<?php

if (isset($_POST['submit'])) {
    try {
        require_once '../src/functions.php';
        $pdo = get_connections();
        $idUser = $_GET['idUser'];

        $user =[
            "name" => $_POST['name'],
            "favgenre" => $_POST['favgenre']
        ];
        $sql = "UPDATE user SET name = :name, favgenre = :favgenre WHERE idUser = ".$idUser;

        $statement = $pdo->prepare($sql);
        $statement->execute($user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage(). "<br>";
        echo "Something went wrong!";

    }
}

if (isset($_GET['idUser'])) {
    try {
        require_once '../src/functions.php';
        $pdo = get_connections();
        $idUser = $_GET['idUser'];
        $sql = "SELECT name,favgenre FROM user WHERE idUser = :idUser";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':idUser', $idUser);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
else {
    echo "Something went wrong!lkn";
    exit;
}
?>

<?php if (isset($_POST['submit']) && $statement) : ?>
    <?php echo $_POST['name']; ?> successfully updated.

<?php endif; ?>
<h2>Edit Account:</h2>
<form method="post">
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;
        ?>" value="<?php echo $value; ?>" <?php echo ($key === 'idUser' ?
            'readonly' : null); ?>>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="Submit">
</form>
<a href="index.php">Back to home</a>
