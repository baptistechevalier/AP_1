<?php
require_once("db_connect.php");

if (isset($_POST['update'])) {
    $id =  $_POST['id'];
    $nom = $_POST['nom_tournoi'];
    $date =  $_POST['date'];
    $id_jeu =  $_POST['id_jeu'];

    if (empty($nom) || empty($date) || empty($id_jeu)) {
        if (empty($nom)) {
            echo "<font color='red'>Nom field is empty.</font><br/>";
        }
        if (empty($date)) {
            echo "<font color='red'>La date du début est vide.</font><br/>";
        }
        if (empty($id_jeu)) {
            echo "<font color='red'>L'ID du jeu est vide.</font><br/>";
        }
    } else {
        $stmt = $pdo->prepare("UPDATE tournois SET nom_tournoi ='$nom' , date ='$date', id_jeu ='$id_jeu' WHERE id = $id");
        $stmt->execute();
        // Display success message
        echo "<p><font color='green'>Tournoi modifié avec succès !</p>";
        echo "<a href='crudproduit.php'>Voir les résultats</a>";
    }
}