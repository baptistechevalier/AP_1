<html>
<head>
    <title>Arras Game</title>
</head>

<body>
<?php
require_once("db_connect.php");

if (isset($_POST['submit'])) {
    $nom = $_POST['nom_tournoi'];
    $date = $_POST['date'];
    $jeu = $_POST['id_jeu'];
   
    if (empty($nom) || empty($date) || empty($jeu)) {
        if (empty($nom)) {
            echo "<font color='red'>Le nom du tournoi est vide.</font><br/>";
        }
        if (empty($date)) {
            echo "<font color='red'>La date est vide.</font><br/>";
        }
        if (empty($jeu)) {
            echo "<font color='red'>Le nom du jeu est vide.</font><br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        $stmt = $pdo->prepare("INSERT INTO tournois (`nom_tournoi`,`date`,`id_jeu`) VALUES (?,?,?)");
   
        if ($stmt->execute([$nom,$date,$jeu])) {
            echo "La requête a été exécutée avec succès.";
            
        } else {
            echo "Erreur lors de l'exécution de la requête.";
            $errorInfo = $stmt->errorInfo();
            echo "Erreur SQL : " . $errorInfo[2]; // [2] contient le message d'erreur.
        }
       
        
        echo "<p><font color='green'>Tournoi ajouté avec succès!</p>";
        echo "<a href='crudtournois.php'>Voir les résultats</a>";
    }
}
?>
</body>
</html>