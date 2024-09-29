<?php session_start();

require("db_connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('header.php');?>

    <?php 
    $id_usr = $_SESSION['id'];
    if(!isset($_SESSION['id'])){
        echo"vous devez être connecté pour vous inscrire";
        exit;
    }
    if (isset($_GET['id'])){
        $id_tournois = htmlspecialchars($_GET['id']);
        $id_user = $id_usr;
    
        try{ //on vérifie qu'il est pas inscrit au tournoi d'abord
            $sql = "SELECT * FROM associations WHERE id_users = :id_user AND id_tournois = :id_tournois";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute(['id_users' => $id_user, 'id_tournois' => $id_tournois]);
            $inscription = $stmt->fetch();
    
            if ($inscription){
                echo"Vous êtes déjà inscrit.";
            } else {
                $sql = "INSERT INTO associations (id_users, id_tournois) VALUES (:id_users, :id_tournois)";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute(['id_users'=>$id_users, 'id_tournois'=>$id_tournois]);
    
                echo "Inscription réussi !";
            }
        } catch (PDOException $e){
            echo"Erreur : ".$e-> getMessage();
        }
    } else {
        echo"Aucun tournoi sélectionné.";
    } ?>
</body>
</html>

