<?php
$server = "localhost";
$user = "root";
$pass = "";
$db_name = "alterEgo";

$conn = new mysqli($server, $user, $pass, $db_name);

if($conn->connect_error) {
  die($conn->connect_error);
}
?>