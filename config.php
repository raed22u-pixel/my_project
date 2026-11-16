<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "portfolio_db2";
$dbport="3306";
$conn = new mysqli($host, $user, $password, $dbname,$dbport);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
