<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('header.php'); ?>
    <?php
        require_once("db_connect.php");

    ?>
    <main>
        <br>
        <div class = "inscription">
            <h1>Inscrivez vous chez Arrass Game !</h1>
        </div>
        <div class = "tableau_inscription">
            <form method="post" action="inscriptionaction.php">
                <label for="pseudo">Pseudo :</label>
                <input type="text" id="pseudo" name="pseudo" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
                <label for="mail">Adresse mail :</label>
                <input type="text" id="mail" name="mail" required> <br>
                <input type="submit" value="S'inscrire">
            </form>
            <br>
            <br>
            <br>
        </div>
    </main>
    <?php include('footer.php') ?>
</body>
</html>