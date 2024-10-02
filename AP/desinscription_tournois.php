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
    <?php include("header.php");?>
    <main>
        <div class="desinscription">
            <br>
            <?php
            $id_user = $_SESSION['idusr'];
            if (!isset($_SESSION['pseudo'])) {
            echo "<h1>Veuillez vous connecter pour vous désinscrire</h1>";
            echo '<a href="connexions.php" class="btn btn-primary mt-3">Se connecter</a>';
            exit;
            }

            

            if (isset($_GET['id'])) {
                $id_tournois = htmlspecialchars($_GET['id']);

                $sql = "DELETE FROM associations WHERE id_users = :id_user AND id_tournois = :id_tournois";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id_user' => $id_user, 'id_tournois' => $id_tournois]);
                echo '<p>Désinscription réussie !</p>';
                echo '<script>
                    setTimeout(function(){
                    window.location.href = "index.php";
                    }, 3000);
                    </script>';
            
            }
            ?>
            <br>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>


