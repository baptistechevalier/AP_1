<?php require('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include('header.php');?>
    <main>
        <?php
        $id_user = $_GET['id'];
        $id_tournois = $_GET['id_tournois'];


        $stmt = $pdo->prepare("DELETE * FROM associations WHERE id_users = $id_user AND id_tournois = $id_tournois");

        $stmt->execute();
        header("index.php");
        exit();?>
    </main>
    <?php include('footer.php');?>
</body>
</html>
<?php 
