<?php
require_once("db_connect.php");


$id = $_GET['id'];


$stmt = $pdo->prepare("DELETE FROM tournois WHERE id = $id");
$stmt->execute();
header("Location:crudtournois.php");
