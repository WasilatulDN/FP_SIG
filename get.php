<?php
require "./database.php";
$connection = new PDO($dsn, $username, $password, $options);

$stmt = $connection->prepare('SELECT * FROM accident');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
// echo '<pre>';
// print_r($result);
// echo '</pre>';
echo json_encode($result);
?>