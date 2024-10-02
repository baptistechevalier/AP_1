<?php 
require_once("db_connect.php");

try {
    $sql = "SELECT tournois.nom_tournoi, tournois.id, tournois.date, jeux.nom_jeu 
            FROM tournois 
            JOIN jeux ON tournois.id_jeu = jeux.id";
    $stmt = $pdo->query($sql);
    $tournois = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : ". $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arras Game</title>
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <br>
        <div class="presentation_tournoi">
            <h1><b>Tournoi à venir</b></h1>
        </div>
        <div class="description">
            <p>Plongez dans l'univers passionnant des jeux vidéo avec nos tournois réguliers. Que vous soyez un amateur ou un compétiteur aguerri, nos événements sont ouverts à tous. Chaque tournoi est conçu pour offrir des expériences uniques sur vos jeux préférés et des plateformes variées. Venez défier d'autres joueurs, montrez vos compétences, et tentez de remporter de superbes prix !</p>
        </div>
        <div class="Tableau_tournoi">
            <table border="1">
                <tr>
                    <th>Numéro du tournoi</th>
                    <th>Nom du tournoi</th>
                    <th>Date et heure</th>
                    <th>Jeu</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($tournois as $tournoi): ?>
                <tr>
                    <td><?= htmlspecialchars($tournoi['id']) ?></td>
                    <td><?= htmlspecialchars($tournoi['nom_tournoi']) ?></td>
                    <td><?= htmlspecialchars($tournoi['date']) ?></td>
                    <td><?= htmlspecialchars($tournoi['nom_jeu']) ?></td>
                    <td>
                        <?php
                        // Vérifier si l'utilisateur est connecté
                        if (isset($_SESSION['pseudo'])) {
                            $pseudo = $_SESSION['pseudo'];

                            // Récupérer l'ID de l'utilisateur
                            $sql = "SELECT id FROM users WHERE pseudo = :pseudo";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(['pseudo' => $pseudo]);
                            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                            $id_user = $user['id'];

                            // Vérifier si l'utilisateur est déjà inscrit au tournoi
                            $sql = "SELECT * FROM associations WHERE id_users = :id_users AND id_tournois = :id_tournois";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute(['id_users' => $id_user, 'id_tournois' => $tournoi['id']]);
                            $inscription = $stmt->fetch();

                            if ($inscription) {
                                // Afficher le lien de désinscription
                                echo '<a href="desinscription_tournois.php?id=' . htmlspecialchars($tournoi['id']) . '">Se désinscrire</a>';
                            } else {
                                // Afficher le lien d'inscription
                                echo '<a href="inscription_tournois.php?id=' . htmlspecialchars($tournoi['id']) . '">S\'inscrire</a>';
                            }
                        } else {
                            echo 'Veuillez vous connecter pour vous inscrire';
                        }
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class = "photo">
            <img src="arras_game1.png" class = "responsive" width = "500px" height = "500px">
        </div>
        <br>
        <br>
        <br>
    </main>
    <?php include("footer.php"); ?>
</body>
</html>
