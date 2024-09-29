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
    <?php include('header.php');?>
    <main>
        <?php    
    
        require_once("db_connect.php");
   
        // Vérification des identifiants
    if(isset($_POST['pseudo']) && isset($_POST['password'])) {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        //vérifications si les identifiants sont les bons
        $stmt = $pdo->prepare("SELECT * FROM users WHERE pseudo = ? AND password = ?");
        $stmt->execute([$pseudo, $password]);
        $count = $stmt->rowCount();
        $user = $stmt->fetch();
    
        if ($count == 1) {
            // Connexion réussie
            
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['idrole'] = $user['idrole'];
            if ($user['idrole'] == '2') {
                header("location: crud.php");
            } else {
                echo "<p>Connexion réussie !</p>";
                header("Location: index.php");
            }
            exit();
        } else {
            echo "<p>Identifiant ou mot de passe incorrect</p>";
        }
    }
    ?>

    <div class = "formulaire_connexion">
        <form method="post" action="connexions.php">
            <label for="pseudo"><b>Pseudo :</b></label><br>
            <input type="text" id="pseudo" name="pseudo" required><br>

            <label for="password"><b>Mot de passe :</b></label><br>
            <input type="password" id="password" name="password" required>
            <br><br>
            <input type="submit" value="Se connecter">
        </form>
    </div>
    <br>
    <div class = "inscription">
        <p>Inscrivez vous <a href="inscription.php">ici</a></p>
    </div>
    </main>
<?php include('footer.php') ?>
</body>
</html>