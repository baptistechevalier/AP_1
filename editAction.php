<?php
// Include the database connection file
require_once("db_connect.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id =  $_POST['id'];
	$pseudo = $_POST['pseudo'];
	$password =  $_POST['password'];
	
	
	// Check for empty fields
	if (empty($pseudo) || empty($password) || empty($mail) || empty($nom) || empty($prenom)){
		if (empty($pseudo)) {
			echo "<font color='red'>Le Pseudo est vide</font><br/>";
		}
		if (empty($password)) {
			echo "<font color='red'>Le mot de passe est vide.</font><br/>";
		}
		if (empty($nom)) {
			echo"<font color='red'>Le nom est vide.</font><br/>";
		}
		if (empty($prenom)){
			echo"<font color = 'red'> Le prenom est vide.</font><br/>";
		}
		if (empty($mail)){
			echo"<font color ='red'> Le mail est vide.</font><br/>";
		}
		
	} else {
	
		$stmt = $pdo->prepare("UPDATE users SET pseudo='$pseudo' , password ='$password', mail='$mail', nom='$nom', prenom='$prenom' WHERE `id` = $id");
		$stmt->execute();
		echo "<p><font color='green'>Modification réussi !</p>";
		echo "<a href='crud.php'>Voir les résultat !</a>";
	}
}
