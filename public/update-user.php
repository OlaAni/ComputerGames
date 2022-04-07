<?php require 'templates/headerlogged.php';  ?>

<?php

if (isset($_POST['submit'])) {
    try {
        require_once '../src/functions.php';
        $user =[
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "age" => $_POST['age'],
            "favgenre" => $_POST['favegenre']
        ];
        $sql = "UPDATE user SET name = :name, email = :email, password = :password, 
                   age = :age, favgenre = :favgenre WHERE idUser = :idUser";
        $pdo = get_connections();
        $statement = $pdo->prepare($sql);
        $statement->execute($user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_GET['idUser'])) {
    try {
        require_once '../src/functions.php';
        $pdo = get_connections();
        $idUser = $_GET['idUser'];
        $sql = "SELECT * FROM user WHERE idUser = :idUser";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':idUser', $idUser);
        $statement->execute();
        $product = $statement->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
else {
    echo "Something went wrong!";
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
