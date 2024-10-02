<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php');?>
    <?php require_once("db_connect.php");?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['nom'];
    $mdp = $_POST['password'];
    $mail = $_POST['mail'];
    $pseudo = $_POST['pseudo'];
    $prenom = $_POST['prenom'];


    try {
        $sql = "INSERT INTO users (pseudo, password, nom, prenom, mail) VALUES (:pseudo, :password, :nom, :prenom, :mail)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':password', $mdp);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':mail', $mail);
        if ($stmt -> execute()) {
            echo "<h2>Inscription réussie</h2>";
            
        } else {
            echo "<h2>Erreur lors de l'inscription.</h2>";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
    <?php include("footer.php");?>
</body>
</html>