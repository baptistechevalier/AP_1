<?php require_once('db_connect.php');

$idtournois = $_GET['id'];
$stmt = $pdo -> prepare("SELECT * from associations WHERE id_tournois = $idtournois");
$stmt -> execute();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arras Game</title>
</head>
<body>
    <?php include('header.php');?>
    <main>
        <br>
		<div class="titre">	
			<h2>Gérer les inscriptions au tournois</h2>
		</div>
		<p>
        	<a href="crudtournois.php">Accueil</a>
		</p>
		<table width='80%' border=0>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Numéro du tournois </strong></td>
				<td><strong>Numéro de l'inscrit</strong></td>
                <td><strong>Action</strong></td>
			</tr>
			<?php
			
	    	while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
            	echo "<tr>";
				echo "<td>".$res['id_users']."</td>";
            	echo "<td>".$res['id_tournois']."</td>";
            	echo "<td><a href=\"delete_inscrit.php?id=".$res['id_users']."&id_tournois=".$res['id_tournois']."\" onClick=\"return confirm('Êtes vous sur de vouloir supprimer ?')\">Supprimer</a></td>";
        	}
	
			?>
		</table>
        <br>
    </main>
    <?php include('footer.php');?>
</body>
</html>