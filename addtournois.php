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
		<br>
		<div class = "titre">
			<h2>Ajouté un tournoi</h2>
		</div>

		<form action="addActiontournois.php" method="post" name="add">
			<table width="25%" border="0">
				<tr> 
					<td>Nom du tournois : </td>
					<td><input type="text" name="nom_tournoi"></td>
				</tr>
				<tr> 
					<td>Date et heure (YYYY-MM-DD HH-MM-SS) : </td>
					<td><input type="date" name="date"></td>
				</tr>
				<tr> 
					<td>Jeu du tournoi :</td>
					<td><input type="text" name="id_jeu"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Ajouter"></td>
				</tr>
			</table>
		</form>
		<div class="titre">
			<h3>Tableau des différents jeux</h3>
		</div>
		<table width='80%' border=0>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Jeux</strong></td>
				<td><strong>ID du jeux</strong></td>
				<td><strong>Pateformes</strong></td>
			</tr>
			<?php
			require_once("db_connect.php");
			$stmt = $pdo->prepare("SELECT * FROM jeux ORDER BY id ");
			$stmt->execute();

	    	while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
            	echo "<tr>";
				echo "<td>".$res['nom_jeu']."</td>";
            	echo "<td>".$res['id']."</td>";
				echo "<td>".$res['plateforme']."</td>";
        	}
	
			?>
		</table>
		<br>
		<br>
		<br>
		<br>
	</main>	
	<?php include('footer.php'); ?>
</body>
</html>

