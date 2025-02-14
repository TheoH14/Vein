<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['Deconnexion'])) {
            unset($_SESSION);
            session_destroy();
            header("Location: connexion.php");
            exit;
        }

        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
    }

    ?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Profil Utilisateur</title>
    <link rel="stylesheet" href="./profil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./profil.js" defer></script>
</head>
<body>

    <header>
        <div>
            <a href="#">  <img src="https://via.placeholder.com/150" alt="Logo Site" title="Cliquer ici pour être rediriger vers la page d'accueil"></a>
        </div>
        <nav>
            <ul>
                <li><a href="#">VEIN</a><i class="fa-solid fa-chevron-down"></i></li>
                <li><a href="#">Shop</a><i class="fa-solid fa-chevron-down"></i></li>
                <li><a href="#">Contacts</a></li>
                <li><a href="#">Carte cadeaux</a></li>
            </ul>
        </nav>
        <form id="searchForm" action="" method="post">
            <div class="research">
                <input type="text" id="searchInput" name="search" placeholder="Rechercher...">
                <i class="fa-solid fa-magnifying-glass"></i> 
            </div>
        </form>
        <div class="profil">
            <i class="fa-regular fa-user"></i>
        </div>
        <div class="panier">
            <i class="fa-solid fa-bag-shopping"></i>
        </div>
    </header>

    <main>
        <form action="" method="post" class="form-profil">
            <div>
                <div class="user-info">
                    <div>
                        <img src="" alt="Photo de profil" title="Voir la photo de profil">
                    </div>
                    <div>
                        <span id="userFirstname" name="userFirstname"></span>
                        <span id="userLastname" name="userLastname"></span>
                        <span id="userGender" name="userGender"></span>
                    </div>
                    <div class="modify">
                        <button type="button" id="modifyProfil">EDIT</button>
                    </div>
                    <div class="logout">
                        <button type="submit" id="logoutBtn" name="Deconnexion">Déconnexion</button>
                    </div>
                </div>
            </div>
    
            <div class="section-profil">
                <div class="user-name">
                    <label for="firstname">Prénom</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Entrer votre prénom" title="Entrer votre prénom">
                </div>
                <div class="user-lastname">
                    <label for="lastname">Nom de Famille</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Entrer votre nom de famille" title="Entrer votre nom de famille">
                </div>
                <div class="user-gender">
                    <label for="gender">Genre</label>
                    <select name="gender" id="gender">
                        <option value=""> --Choisissez votre genre</option>
                        <option value="Homme" name="Homme">Homme</option>
                        <option value="Femme" name="Femme">Femme</option>
                    </select>
                </div>
            </div>
    
            <div class="add-email">
                <div>
                    <div class="email">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Entrer votre email" title="Entrer votre email">
                        <span id="emailError" class="error"></span>
                    </div>
                </div>
                <button type="button" id="addEmailBtn" name="addEmailBtn">+ADD EMAIL ADRESSE</button>
                <div>
                    <i class="fa-solid fa-envelope"></i> <span id="userEmail" name="userEmail"></span>
                </div>
            </div>
        </form>
    </main>


    


    <footer></footer>
    
</body>
</html>