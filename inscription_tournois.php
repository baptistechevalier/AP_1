<?php require("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('header.php');?>
    <form action="inscription_tournoisAcction.php" method="post" name="inscription">
			<table width="25%" border="0">
				<tr> 
					<td>Numéro du tournois : </td>
					<td><input type="text" name="id_tournoi"></td>
				</tr>
				<tr> 
					<td>Pseudo :</td>
					<td><input type="text" name="pseudo"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="S'inscrire"></td>
				</tr>
			</table>
		</form>

</body>
</html>