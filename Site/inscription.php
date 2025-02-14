<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Vein icon" href="Image/Logo Vein black.svg">
    <link rel="stylesheet" href="inscription.css">
    <link href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <title>Vein - Inscription</title>
</head>
<body>
    <section class="Logo">
        <div class="Logo_v"></div>
    </section>

    <section class="Coord">
        <div class="Info">
            <form action="" method="post">
                <div class="name">
                    <img src="./Image/user.svg" alt="User">
                    <input type="text" name="name" placeholder="FullName" autofocus required>
                </div>
                <div class="email">
                    <img src="./Image/Vector.svg" alt="E-Mail">
                    <input type="email" name="mail" placeholder="E-Mail"  required>
                </div>
                <div class="Phone">
                    <img src="./Image/iconamoon_phone-thin.svg" alt="Phone">
                    <input type="tel" maxlength="10" name="Phone" placeholder="Phone number "  required>
                </div>
                <div class="password">
                    <img src="./Image/lock.svg" alt="Password">
                    <input type="password" name="Password" placeholder="password"  required>
                </div>
                <div class="Confirm">
                    <img src="./Image/lock.svg" alt="Password">
                    <input type="password" name="RepeatPassword" placeholder="Confirm Password"  required>
                </div>
                <button class="Register" type="submit" name="Enregistrer">Register</button>
            </form>
            <div class="Login">
                <a href="connexion.php">Have account ? Sign in</a>
            </div>
        </div>
    </section>
</body>
</html>

<?php
    require_once 'connect.php';

    if (isset($_POST['Enregistrer'])){
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($_POST['Phone'], ENT_QUOTES, 'UTF-8');
        $password = htmlspecialchars($_POST['Password'], ENT_QUOTES, 'UTF-8');
        $repeatPassword = htmlspecialchars($_POST['RepeatPassword'], ENT_QUOTES, 'UTF-8');
        $regexphone = "/^(+33|0|0033)[1-9](\d{2}){4}$/";



        if(!empty($name) && !empty($mail) && !empty($phone) && !empty($password) && !empty($repeatPassword))
        {
            if(strlen($mail)< 5) {echo "Veuillez remplir tous les champs";}
        
        else
        {$req = $pdo->prepare("INSERT INTO utilisateur (NomUtilisateur, AdresseMail, Telephone, Password, RepeatPassword) VALUES (?,?,?,?,?)");
        
        $password = password_hash($password, PASSWORD_DEFAULT);
        $repeatPassword = password_hash($repeatPassword, PASSWORD_DEFAULT);

        $req->bindParam(1, $name, PDO::PARAM_STR);
        $req->bindParam(2, $mail, PDO::PARAM_STR);
        $req->bindParam(3, $phone, PDO::PARAM_STR);
        $req->bindParam(4, $password, PDO::PARAM_STR);
        $req->bindParam(5, $repeatPassword, PDO::PARAM_STR);

        if ($req->execute()) {

            echo "Inscription réussie";
            header("Location: connexion.php");
            exit;
        }
        else
        {
            echo "Erreur lors de l'inscription";
        }
    
    }
}

        function validate_phone($phone)
        {
            $regexphone = "/^(\+33|0|0033)[1-9](\d{2}){4}$/";
            if(preg_match($regexphone, $phone))
            {
                return " Numéro de téléphone valide";
            }
            else
            {
                return " Veuillez entrer un numéro de téléphone valide";
            }
        }

    }


?>

