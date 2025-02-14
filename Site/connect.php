<?php
    try {

        $pdo = new PDO('mysql:host=localhost; dbname=vein', 'root', '');
    } 
    
    catch (PDOException $e) 
    {

        echo "Erreur : " . $e->getMessage();
    }

?>