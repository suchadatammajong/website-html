<?php
    $servername = "localhost";
    $username = "surache1_room1g2";
    $password = "ZPN25472";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=surache1_room1g2", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>