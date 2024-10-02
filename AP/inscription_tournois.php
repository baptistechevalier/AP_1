<?php 
require("db_connect.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include('header.php');?>
    <main>
        <div class = "erreur_inscription">
            <?php 
            if(!isset($_SESSION['pseudo'])){
                echo" ";?>
                <h1>Veulliez vous connecter pour vous inscire</h1>
                <a href="connexions.php" class="btn btn-primary mt-3">Se connecter</a>
                <?php
                exit;
            } ?>
        </div>
        <?php
        $pseudo = $_SESSION['pseudo'];
        $sql = "SELECT id FROM users WHERE pseudo='$pseudo'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_user = $result['id'];?>

        <div class = "inscriptionAction">
            <?php
            if (isset($_GET['id'])){
                $id_tournois = htmlspecialchars($_GET['id']);
                $id_user = $result['id'];
            
                try{ //on vérifie qu'il est pas inscrit au tournoi d'abord
                    $sql = "SELECT * FROM associations WHERE id_users = $id_user AND id_tournois = $id_tournois";
                    $stmt = $pdo -> prepare($sql);
                    $stmt -> execute(['id_users' => $id_user, 'id_tournois' => $id_tournois]);
                    $inscription = $stmt->fetch();
            
                    if ($inscription){
                        echo'<h1>Vous êtes déjà inscrit.<h1>';
                    } else {
                        $sql = "INSERT INTO associations (id_users, id_tournois) VALUES ($id_user, $id_tournois)";
                        $stmt = $pdo -> prepare($sql);
                        $stmt -> execute(['id_users'=>$id_user, 'id_tournois'=>$id_tournois]);?>
            
                        <h1>Félicitations vous êtes inscrit !</h1>
                        <img src="https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExcXdhaWhqZnU5NXJhcGN2bzlmdmQ1dGZvdTdhdHVhbWFtMnRxajJ0ZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/g9582DNuQppxC/giphy.gif" class = "responsive" height = "500px" width="500px">
                        <?php
                    }
                } catch (PDOException $e){
                    echo"Erreur : ".$e-> getMessage();
                }
            } else {
                echo"Aucun tournoi sélectionné.";
            } ?>
        </div>
        <br>
    </main>
    <?php include('footer.php');?>
</body>
</html>
<script>
    setTimeout(function(){
    window.location.href = "index.php";
    }, 8000);
</script>'
