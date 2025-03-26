<?php
require_once("db_connect.php");

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = $id");
$stmt->execute();
$resultData = $stmt->fetch(PDO::FETCH_ASSOC);

$pseudo = $resultData['pseudo'];
$password = $resultData['password'];
$mail = $resultData['mail'];
$nom = $resultData['nom'];
$prenom = $resultData ['prenom'];

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
	<?php include('header.php') ?>
	<main>
    	<h2>Modifier les utilisateurs</h2>
    	<p>
	    	<a href="crud.php">Accueil CRUD</a>
    	</p>
	
		<form name="edit" method="post" action="editAction.php">
			<table border="0">
				<tr> 
					<td>Peuso</td>
					<td><input type="text" name="pseudo" value="<?php echo $pseudo; ?>"></td>
				</tr>
				<tr> 
					<td>Password</td>
					<td><input type="text" name="password" value="<?php echo $password; ?>"></td>
				</tr>
				<tr>
					<td>Adresse email :</td>
					<td><input type="text" name = "mail" value = "<?php echo $mail;?>"></td>
				</tr>
				<tr>
					<td>Nom :</td>
					<td><input type = "text" name="nom" value = "<?php echo $nom;?>"></td>
				</tr>
				<tr>
					<td>Prénom :</td>
					<td><input type = "text" name="prenom" value = "<?php echo $prenom;?>"></td>
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
