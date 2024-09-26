<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("db_connect.php");

if (isset($_POST['submit'])) {
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];

	// Check for empty fields
	if (empty($pseudo) || empty($password) || empty($nom) || empty($prenom) || empty($mail)){
		if (empty($pseudo)) {
			echo "<font color='red'>Le pseudo est vide</font><br/>";
		}
		if (empty($password)) {
			echo "<font color='red'>Le mot de passe est vide.</font><br/>";
		}
		if (empty($nom)){
			echo"><font color='red'>Le nom est vide</font><br/>";
		}
		if (empty($prenom)){
			echo "<font color='red'>Le prenom est vide</font><br/>";
		}
		if (empty($mail)){
			echo "<font color='red'>Le mail est vide</font><br/>";
		}
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
	
		$stmt = $pdo->prepare("INSERT INTO users (`pseudo`, `password`,`nom`, `prenom`, `mail`) VALUES ('$pseudo', '$password','$nom', '$prenom', '$mail')");
		$stmt->execute([$pseudo, $password, $nom, $prenom, $mail]);

		echo "<p><font color='green'>Utilisateur ajouté !</p>";
		echo "<a href='index.php'>Voir les résultat</a>";
	}
}
?>
</body>
</html>
