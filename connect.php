<?php
$mysqli = new mysqli("localhost", "root", "", "bd");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>

