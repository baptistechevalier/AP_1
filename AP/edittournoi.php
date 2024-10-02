<?php

require_once("db_connect.php");

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM tournois WHERE id = $id");
$stmt->execute();
// Fetch the next row of a result set as an associative array
$resultData = $stmt->fetch(PDO::FETCH_ASSOC);

$nom = $resultData['nom_tournoi'];
$date = $resultData['date'];
$id_jeu = $resultData['id_jeu'];

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arras Game</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<?php include('header.php') ?>
	<main>
    	<h2>Modifier tournois</h2>
    	<p>
	    	<a href="crudtournois.php">Accueil</a>
    	</p>
	
		<form name="edit" method="post" action="editActiontournois.php">
			<table border="0">
				<tr> 
					<td>Nom</td>
					<td><input type="text" name="nom" value="<?php echo $nom; ?>"></td>
				</tr>
				<tr> 
					<td>Date :</td>
					<td><input type="text" name="date" value="<?php echo $date; ?>"></td>
				</tr>
				<tr> 
					<td>Le jeu :</td>
					<td><input type="text" name="id_jeu" value="<?php echo $id_jeu; ?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
					<td><input type="submit" name="update" value="Modifier"></td>
				</tr>
			</table>
		</form>
	</main>
	<?php include('footer.php') ?>
</body>
</html>
