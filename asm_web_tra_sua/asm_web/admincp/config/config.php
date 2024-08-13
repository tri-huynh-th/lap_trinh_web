<?php
//in xampp localhost: local, my_user: root, my_password: "", my_db: tra_sua
$mysqli = new mysqli("localhost","root","","tra_sua");

// Check connection
if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
?>