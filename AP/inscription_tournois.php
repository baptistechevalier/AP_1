<?php 
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
    $pseudo = $_SESSION['pseudo'];
    $sql = "SELECT id FROM users WHERE pseudo='$pseudo'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $id_user = $result['id'];
    if(!isset($_SESSION['pseudo'])){
        echo"vous devez être connecté pour vous inscrire";
        exit;
    }
    if (isset($_GET['id'])){
        $id_tournois = htmlspecialchars($_GET['id']);
        $id_user = $result['id'];
    
        try{ //on vérifie qu'il est pas inscrit au tournoi d'abord
            $sql = "SELECT * FROM associations WHERE id_users = $id_user AND id_tournois = $id_tournois";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute(['id_users' => $id_user, 'id_tournois' => $id_tournois]);
            $inscription = $stmt->fetch();
    
            if ($inscription){
                echo"Vous êtes déjà inscrit.";
            } else {
                $sql = "INSERT INTO associations (id_users, id_tournois) VALUES ($id_user, $id_tournois)";
                $stmt = $pdo -> prepare($sql);
                $stmt -> execute(['id_users'=>$id_user, 'id_tournois'=>$id_tournois]);
    
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

