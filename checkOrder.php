<?php

include_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['orderNumber'])) {
    $number = $_POST['orderNumber'];
    $sql = "SELECT * FROM `extraordinaire`.`orders` WHERE `ordernumber` = $number AND `played` = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo json_encode(array('success' => 1));
    } else {
        echo json_encode(array('success' => 2));
    }
    $conn->close();
} else {
    echo json_encode(array('success' => 0));
}
