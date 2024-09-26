<?php require_once("db_connect.php");
try{
    $sql = "SELECT tournois.nom_tournoi, tournois.id, tournois.date, jeux.nom_jeu FROM tournois JOIN jeux ON tournois.id_jeu = jeux.id";
    $stmt = $pdo->query($sql);
    $tournois = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    echo "Erreur : ". $e->getMessage(); //sOn arrête le script en cas d'erreur pour éviter d'afficher du code non sécurisé
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
    <?php include("header.php");?>
    <main>
        <div class = "presentation_tournoi">
            <h1>Tournoi à venir</h1>
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
                <?php foreach($tournois as $tournois):?>
                <tr>
                    <td><?=$tournois['id']?></td>
                    <td><?=$tournois['nom_tournoi']?></td>
                    <td><?=$tournois['date']?></td>
                    <td><?=$tournois['nom_jeu']?></td>
                    <td>
                        <a href="inscription_tournois.php?id=<?=htmlspecialchars($tournois['id'])?>">S'inscrire</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </main>
    <?php include("footer.php");?>
</body>
</html>