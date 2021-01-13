<?php
require "./database.php";
$connection = new PDO("mysql:host=$host", $username, $password, $options);
$sql = file_get_contents("./init.sql");
$connection->exec($sql);
echo "success"
?>