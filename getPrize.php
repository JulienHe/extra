<?php

include_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$number = $_POST['orderNumber'];
$sql = "SELECT id, prize FROM winner WHERE ordernumber = 0 ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $theID = 0;
    while($row = $result->fetch_assoc()) {
        echo $row["prize"];
        $theID = $row["id"];
    }
    $sqlUpdate = "UPDATE winner SET ordernumber=$number WHERE id=$theID";
    $resultUPDATE = $conn->query($sqlUpdate);
} else {
    echo json_encode(array('prize' => 2));
}
$conn->close();
