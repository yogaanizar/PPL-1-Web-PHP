<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "E-Commerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM barang";
$result = $conn->query($sql);

?>