<?php
require_once("db_connect.php");
$stmt = $pdo->prepare("SELECT tournois.id, tournois.nom_tournoi AS nom_tournoi, tournois.date, jeux.nom_jeu FROM tournois JOIN jeux ON tournois.id_jeu = jeux.id ORDER BY tournois.id");
$stmt->execute();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueille</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<?php include('header.php'); ?>
	<main>
		<br>
		<div class="titre">	
			<h2>Gérer les tournois</h2>
		</div>
		<p>
			<a href="addtournois.php ">Ajouter nouveau tournois</a>
        	<a href="crud.php">Crud pour les utilisateur</a>
		</p>
		<table width='80%' border=0>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Numéro du tournois </strong></td>
				<td><strong>Nom du tournoi</strong></td>
				<td><strong>Date</strong></td>
            	<td><strong>Jeu</strong></td>
				<td><strong>Action</strong></td>
			</tr>
			<?php
			
	    	while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
            	echo "<tr>";
				echo "<td>".$res['id']."</td>";
            	echo "<td>".$res['nom_tournoi']."</td>";
            	echo "<td>".$res['date']."</td>";
            	echo "<td>".$res['nom_jeu']."</td>";
            	echo "<td><a href=\"edittournoi.php?id=".$res['id']."\">Modifier</a> | 
            	<a href=\"deletetournois.php?id=".$res['id']."\" onClick=\"return confirm('Êtes vous sur de vouloir supprimer ?')\">Supprimer</a></td>";
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