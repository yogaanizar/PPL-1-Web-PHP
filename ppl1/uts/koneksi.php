<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_pegawai";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pegawai";
    $result = $conn->query($sql);

?>