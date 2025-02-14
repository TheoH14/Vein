<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur</title>
</head>
<style>
    
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


h4{
    text-align: center;}

table{
    border: 2px solid;
    width: 70%;
    margin-left: 10%;
    margin-top: 20px;
}

td{
    border: 1px solid;
    text-align: center;
}

th{
    border: 1px solid;
    text-align: center;
}

.actions{
    display: flex;
    gap: 10px;
}

</style>
<body>


    <h4>Liste des utilisateurs</h4>

    <table>
        <th>ID</th>
        <th>Nom d'utilisateur</th>
        <th>E-mail</th>
        <th>Téléphone</th>
        <th>Mot de passe</th>
        <th>confirmation Mot de passe</th>
        <th>Actions</th>

    <?php

        require_once ('connect.php');
        $req=$pdo->query("SELECT * FROM utilisateur");
        while($aff=$req->fetch()){
            ?>



        <tr>
            <td> <?php echo $aff['ID']; ?> </td>
            <td> <?php echo $aff['NomUtilisateur']; ?> </td>
            <td> <?php echo $aff['AdresseMail']; ?> </td>
            <td> <?php echo $aff['Telephone']; ?> </td>
            <td> <?php echo $aff['Password']; ?> </td>
            <td> <?php echo $aff['RepeatPassword']; ?> </td>

            <td class="actions">
                <a href="update.php?ID=<?php echo $aff['ID'] ?>">Modifier</a>
                <a href="delete.php?ID=<?php echo $aff['ID'] ?>">Supprimer</a>
            </td>
        </tr>


        <?php } ?>
        
    </table>

</body>
</html>