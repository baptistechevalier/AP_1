<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Inscription</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php'); ?>
    <?php require_once("db_connect.php"); ?>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nom = htmlspecialchars($_POST['nom']);
        $mdp = $_POST['password'];
        $mail = htmlspecialchars($_POST['mail']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $prenom = htmlspecialchars($_POST['prenom']);

        try {
            // Vérifier si l'email ou le pseudo existent déjà
            $sql = "SELECT id FROM users WHERE pseudo = :pseudo OR mail = :mail";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['pseudo' => $pseudo, 'mail' => $mail]);
            $userExists = $stmt->fetch();

            if ($userExists) {
                echo "<h2>Erreur : Pseudo ou email déjà utilisé.</h2>";
            } else {
                // Hasher le mot de passe
                $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

                // Insérer l'utilisateur
                $sql = "INSERT INTO users (pseudo, password, nom, prenom, mail) VALUES (:pseudo, :password, :nom, :prenom, :mail)";
                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':pseudo', $pseudo);
                $stmt->bindParam(':password', $hashedPassword); // Mot de passe hashé
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':mail', $mail);

                if ($stmt->execute()) {
                    echo "<h2>Inscription réussie !</h2>";
                } else {
                    echo "<h2>Erreur lors de l'inscription.</h2>";
                }
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
    ?>

    <?php include("footer.php"); ?>
</body>
</html>
