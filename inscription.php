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
    <p>Inscrivez vous chez Arrasqs Game !</p>
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
        <input type="text" id="mail" name="mail" required>
        <input type="submit" value="S'inscrire">
    </form>
<?php include('footer.php') ?>
</body>
</html>