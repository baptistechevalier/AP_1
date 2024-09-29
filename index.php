<?php require_once('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Arras Game</title>
    </head>
    <body>
        <?php include('header.php') ;?>
        <main>
        <br>
        <br>
        <br>
            <div class="presentation">
                <h1>Bienvenue chez <b>Arras Game</b></h1>
            </div>
            <div class = "intro">
                <p>Bienvenue chez <b>Arras Game</b>, votre cyber café incontournable pour les passionnés de jeux vidéo ! <br>Plongez dans une ambiance conviviale où les gamers de tous horizons se rencontrent pour partager des moments intenses autour de leurs jeux favoris. En plus de nos stations de gaming performantes, nous organisons régulièrement des <b>tournois de jeux vidéo</b>, offrant à chacun l'opportunité de prouver ses talents. Que vous soyez un joueur occasionnel ou un compétiteur chevronné, Arras Game est l'endroit idéal pour vous immerger dans l'univers du jeu vidéo.</p>
                <br>
                <img src="arras_game.png" class = "responsive" witdh="500px" height="500px">
                <br>
                <a href="liste_tournoi.php" class="btn btn-primary mt-3">Nos prochain tournois</a>
            </div>
        </main>
        <?php include ('footer.php');?>
    </body>
</html>