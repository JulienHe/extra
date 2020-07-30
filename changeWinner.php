<?php

include_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$number = $_POST['orderNumber'];
$sqlUpdate = "UPDATE winner SET updated=1 WHERE ordernumber=$number";
$resultUPDATE = $conn->query($sqlUpdate);

if ($resultUPDATE) {
    echo 1;
} else {
    echo 0;
}
$conn->close();