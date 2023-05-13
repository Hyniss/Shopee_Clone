<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myshop";

$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
  die("lỗi dữ liệu : " . mysqli_connect_error());
  exit();
}

?>