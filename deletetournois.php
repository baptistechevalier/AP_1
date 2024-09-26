<?php
// Include the database connection file
require_once("db_connect.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$stmt = $pdo->prepare("DELETE FROM tournois WHERE id = $id");
$stmt->execute();
// Redirect to the main display page (index.php in our case)
header("Location:crudtournois.php");
