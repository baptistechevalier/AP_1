<?php
// Include the database connection file
require_once("db_connect.php");


$stmt = $pdo->prepare("SELECT * FROM users ORDER BY id ");
$stmt->execute();
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
	<?php include('header.php'); ?>
	<main>
		<br>
		<div class="titre">
			<h2>Accueil</h2>
		</div>
		<p>
			<a href="crudtournois.php">Crud pour les tournois</a>
			<a href="add.php">Ajouter un utilisateurs</a>
		</p>
		<table width='80%' border=0>
			<tr bgcolor='#DDDDDD'>
				<td><strong>Id</strong></td>
				<td><strong>Pseudo</strong></td>
				<td><strong>Password</strong></td>
				<td><strong>Action</strong></td>
			</tr>
			<?php
			// Fetch the next row of a result set as an associative array
	    	while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
            	echo "<tr>";
				echo "<td>".$res['id']."</td>";
            	echo "<td>".$res['pseudo']."</td>";
            	echo "<td>".$res['password']."</td>";
            	echo "<td><a href=\"edit.php?id=".$res['id']."\">Edit</a> | 
            	<a href=\"delete.php?id=".$res['id']."\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        	}
	
			?>
		</table>
		<br>
		<br>
		<br>
	</main>
	<?php include('footer.php'); ?>
</body>
</html>