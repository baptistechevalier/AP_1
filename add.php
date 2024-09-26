<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<main>
		<?php include('header.php') ?>
		<h2>Ajouter un utilisateur</h2>
		<p>
			<a href="crud.php">Accueil</a>
		</p>

		<form action="addAction.php" method="post" name="add">
			<table width="25%" border="0">
				<tr> 
					<td>Nom :</td>
					<td><input type="text" name="nom"></td>
				</tr>
				<tr> 
					<td>Prénom :</td>
					<td><input type="text" name="prenom"></td>
				</tr>
				<tr> 
					<td>Adresse mail :</td>
					<td><input type="text" name="mail"></td>
				</tr>
				<tr> 
					<td>Pseudo du joueur :</td>
					<td><input type="text" name="pseudo"></td>
				</tr>
				<tr> 
					<td>Password</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr> 
					<td></td>
					<td><input type="submit" name="submit" value="Ajouter"></td>
				</tr>
			</table>
		</form>
		<?php include('footer.php') ?>
	</main>	
</body>
</html>

