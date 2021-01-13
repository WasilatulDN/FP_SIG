<?php
require "./database.php";
$connection = new PDO($dsn, $username, $password, $options);
// echo print_r($_POST);
if (isset($_POST['type']) && isset($_POST['address']) && isset($_POST['duration'])) {
    $type = $_POST['type'];
    $address = $_POST['address'];
    $duration = $_POST['duration'];
    $sql =  'DELETE FROM accident where type=:type AND  address=:address AND duration=:duration';
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':type',$type);
    $stmt->bindParam(':address',$address);
    $stmt->bindParam(':duration',$duration);
    $stmt->execute();
    http_response_code(203);
    header('Content-Type: application/json');
    echo json_encode(array(
        'msg' => 'Data has been deleted!'
    ));

} else {
    http_response_code(400);
    echo json_encode(array(
        'msg' => "Please fill in all the fields",
    ));
}
?>