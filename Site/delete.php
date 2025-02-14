<?php
require_once ('connect.php');

if(isset($_GET['ID'])){
    $ID = $_GET['ID'];
    $req=$pdo->prepare('DELETE FROM utilisateur WHERE ID = ?');
    $req->execute([$ID]);
    if($req){
        header ("suppression reussie");
    }

    if($req){
        header('location:read.php');
    }
}



?>