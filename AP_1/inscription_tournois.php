<?php 
require("db_connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Tournoi</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <div class="erreur_inscription">
            <?php 
            if (!isset($_SESSION['pseudo'])) {
                echo '<h1>Veuillez vous connecter pour vous inscrire</h1>';
                echo '<a href="connexions.php" class="btn btn-primary mt-3">Se connecter</a>';
                exit;
            }
            ?>
        </div>
        
        <?php
        $pseudo = $_SESSION['pseudo'];

        // Récupérer l'ID de l'utilisateur connecté
        $sql = "SELECT id FROM users WHERE pseudo = :pseudo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['pseudo' => $pseudo]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            echo "<h1>Erreur : Utilisateur non trouvé.</h1>";
            exit;
        }

        $id_user = $result['id'];
        ?>

        <div class="inscriptionAction">
            <?php
            if (isset($_GET['id'])) {
                $id_tournois = htmlspecialchars($_GET['id']);

                try {
                    // Vérifier si l'utilisateur est déjà inscrit
                    $sql = "SELECT * FROM associations WHERE id_users = :id_users AND id_tournois = :id_tournois";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(['id_users' => $id_user, 'id_tournois' => $id_tournois]);
                    $inscription = $stmt->fetch();

                    if ($inscription) {
                        echo '<h1>Vous êtes déjà inscrit.</h1>';
                    } else {
                        // Inscription de l'utilisateur au tournoi
                        $sql = "INSERT INTO associations (id_users, id_tournois) VALUES (:id_users, :id_tournois)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute(['id_users' => $id_user, 'id_tournois' => $id_tournois]);

                        echo '<h1>Félicitations, vous êtes inscrit !</h1>';
                        echo '<img src="https://i.giphy.com/media/v1.Y2lkPTc5MGI3NjExcXdhaWhqZnU5NXJhcGN2bzlmdmQ1dGZvdTdhdHVhbWFtMnRxajJ0ZyZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/g9582DNuQppxC/giphy.gif" class="responsive" height="500px" width="500px">';
                    }
                } catch (PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            } else {
                echo "<h1>Aucun tournoi sélectionné.</h1>";
            }
            ?>
        </div>
        <br>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>

<script>
    setTimeout(function() {
        window.location.href = "index.php";
    }, 8000);
</script>
