<?php
require '../autoload.php';

?>

<?php require 'templates/headerlogged.php';

?>


<?php

$user = new User($_SESSION['id']);


?>
<?php
if($user->getEmployee()=="false"){
    $user = new Customer($_SESSION['id']);
    ?>
    <h2 class="profile">Update Account:</h2>
    <table>
        <thead>
        <tr>
            <th class="profileInfo">Name:</th>
            <th class="profileInfo">Email:</th>
            <th class="profileInfo">Age:</th>
            <th class="profileInfo">Genre:</th>
        </tr>
        </thead>
    </table>
    <tbody>
    <td><span class="profileInfo"><?php echo $user->getName();?></span></td>
    <td><span class="profileInfo"><?php echo $user->getEmail();?></span></td>
    <td><span class="profileInfo"><?php echo $user->getAge();?></span></td>
    <td><span class="profileInfo"><?php echo $user->getFavGenre();?></span></td>
    <td><a class="profileInfo" href="update-user.php?idUser=<?php echo $user->getId(); ?>">Edit</a></td>

    </tbody>

    <form action="tradein.php" method="post" >
        <button name="Submit" value="cart" class="profileButton" type="submit">Trade In</button>
    </form>
<?php }
else{
    $user = new Admin($_SESSION['id']);?>
    <table>
        <thead>

    <tr>
        <th>Name:</th>
        <th>Email:</th>
        <th>Status:</th>
    </tr>
    </thead>
    </table>
    <tbody>
    <td><?php echo $user->getName();?></td>
    <td><?php echo $user->getEmail();?></td>
    <td><?php echo $user->getEmployee();?></td>
    </tbody>


    <form action="adminpage.php" method="post" >
        <button name="Submit" value="cart" class="button" type="submit">Edit</button>
    </form>
<?php }?>
<?php require 'templates/footer.php';?>