<?php

include_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$number = $_POST['orderNumber'];
$sql = "SELECT id FROM extraordinaire.orders WHERE ordernumber = $number";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo json_encode(array('add' => 0));
} else {
    $sql = "INSERT INTO extraordinaire.orders (ordernumber) VALUES ($number);";
    $result = $conn->query($sql);
    echo json_encode(array('add' => 1));
}
