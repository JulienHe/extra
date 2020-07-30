<?php

include_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


for ($i = 1; $i <= 30; $i++) {
    $sql = "INSERT INTO winner (ordernumber, prize) VALUES (0, 2);";
    $result = $conn->query($sql);
}

for ($i = 1; $i <= 140; $i++) {
    $sql = "INSERT INTO winner (ordernumber, prize) VALUES (0, 3);";
    $result = $conn->query($sql);
}

for ($i = 1; $i <= 80; $i++) {
    $sql = "INSERT INTO winner (ordernumber, prize) VALUES (0, 4);";
    $result = $conn->query($sql);
}

for ($i = 1; $i <= 6; $i++) {
    $sql = "INSERT INTO winner (ordernumber, prize) VALUES (0, 5);";
    $result = $conn->query($sql);
}

for ($i = 1; $i <= 6; $i++) {
    $sql = "INSERT INTO winner (ordernumber, prize) VALUES (0, 6);";
    $result = $conn->query($sql);
}

for ($i = 1; $i <= 2; $i++) {
    $sql = "INSERT INTO winner (ordernumber, prize) VALUES (0, 7);";
    $result = $conn->query($sql);
}