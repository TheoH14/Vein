<?php
require_once 'connect.php';

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
    $req=$pdo->query("SELECT * FROM utilisateur WHERE ID=$ID");
    $mod=$req->fetch();
    }
?>

    <h2>Modification du produit</h2>

    <form action="" method="post">

        <label for="">Nom Utilisateur </label><input value="<?php echo $mod['NomUtilisateur']; ?>" type="text" name="name" autocomplete="off"><br>

        <label for="">Email </label><input value="<?php echo $mod['AdresseMail']; ?>" type="text"  name="mail" autocomplete="off"><br>

        <label for="">Phone </label><input value="<?php echo $mod['Telephone']; ?>" type="tel" name="Phone" autocomplete="off"><br>

        <label for="">Password </label><input value="<?php echo $mod['Password']; ?>" type="password" name="Password" autocomplete="off"><br>
        
        <label for="">Confirm Password </label><input value="<?php echo $mod['RepeatPassword']; ?>" type="password" name="RepeatPassword" autocomplete="off"><br>

        <button type="submit" name="Modifier">Modifier</button>

    </form>

    <?php 
        if(isset($_POST['Modifier'])){
            $name=$_POST['name'];
            $mail=$_POST['mail'];
            $Phone=$_POST['Phone'];
            $Password=$_POST['Password'];
            $RepeatPassword=$_POST['RepeatPassword'];

            $Password = password_hash($Password, PASSWORD_DEFAULT);
            $RepeatPassword = password_hash($RepeatPassword, PASSWORD_DEFAULT);

            $req=$pdo->query("UPDATE utilisateur SET NomUtilisateur='$name', AdresseMail='$mail', Telephone='$Phone', Password='$Password', RepeatPassword='$RepeatPassword' WHERE ID=$ID");


            if($req){
                header('location:read.php');
            }
        }

    ?>

    