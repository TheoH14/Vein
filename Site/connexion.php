<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Vein icon" href="Image/Logo Vein black.svg">
    <link rel="stylesheet" href="Connexion.css">
    <link href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <title>Vein - Connexion</title>
</head>
<body>
    <section class="Logo">
        <div class="Logo_v"></div>
    </section>

    <section class="Coord">
        <div class="Info">
            <form action="" method="post">
                <div class="email">
                    <img src="./Image/Vector.svg" alt="E-Mail">
                    <input type="email" placeholder="E-Mail" name="mail" autofocus required>
                </div>
                <div class="password">
                    <img src="./Image/lock.svg" alt="Password">
                    <input type="password" placeholder="password" name="Password" autofocus required>
                </div>
                <button name="Login" type="submit" class="Login">Login</button>
            </form>
            <div class="inscription">
                <a href="inscription.php">Haven't account ? Sign up</a>
            </div>
            <form class="PositionForgot" action="">
                <div class="Forgot">
                    <p>Forgot password ?</p>
                </div>
            </form>
        </div>
    </section>
</body>
</html>


<?php

    require_once 'connect.php';

    session_start(['cookie_lifetime' => 1200]);

    if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true)
{
    header("Location:profil.php");
    exit;
}

$mail = $password = "";
$error = [];

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['Login']))
{

    if(empty($_POST['mail']))
    {
         $error['mail'] = "Email is required";
    }
    else
    {
         $mail = htmlspecialchars(trim($_POST['mail']), ENT_QUOTES, 'UTF-8');
    }



   if(empty($_POST['Password']))
   {
       $error['Password'] = "Password is required";
   }
   else
   {
       $password = trim($_POST['Password']);
   }
   

   if(empty($error))
   {
       $req = $pdo->prepare("SELECT * FROM utilisateur WHERE AdresseMail = :mail");
       $req->execute(['mail' => $mail]);
       $user = $req->fetch();

       if($user && password_verify($password, $user['Password']))
       {

           $_SESSION['logged'] = true;
           {
                header("Location:profil.php");
                exit;
           }

       }

       else
       {
           $error['login'] = "Email or password is incorrect";

           echo("E-Mail ou mot de passe incorrect");
       }
   }

}
    
    ?>