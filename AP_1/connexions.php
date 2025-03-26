<?php
session_start(); // Démarrer la session si ce n'est pas déjà fait
require_once("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $password = $_POST['password'];

        // Récupérer l'utilisateur avec le pseudo donné
        $stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = ?");
        $stmt->execute([$pseudo]);
        $user = $stmt->fetch();

        // Vérification si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['idrole'] = $user['idrole'];
            $_SESSION['idusr'] = $user['id'];

            if ($user['idrole'] == '2') {
                header("Location: crud.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            $errorMessage = "Identifiant ou mot de passe incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Arras Game</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include('header.php'); ?>
    <main>
        <br>
        <div class="formulaire_connexion">
            <h2>Connectez-vous</h2>
            <?php if (isset($errorMessage)) { echo "<p style='color:red;'>$errorMessage</p>"; } ?>
            <form method="post" action="connexions.php">
                <label for="pseudo"><b>Pseudo :</b></label><br>
                <input type="text" id="pseudo" name="pseudo" class="formulaire_connexion" required><br>

                <label for="password"><b>Mot de passe :</b></label><br>
                <input type="password" id="password" name="password" class="formulaire_connexion" required>
                <br><br>
                <input type="submit" value="Se connecter" class="formulaire_connexion"><br>
            </form>
        </div>
        <br>
        <div class="inscription">
            <p>Inscrivez-vous <a href="inscription.php">ici</a></p>
        </div>
        <br>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>
