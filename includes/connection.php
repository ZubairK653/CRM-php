<?php 

$server_name = "localhost";
$db_name     = "crm_db";
$user_name   = "root";
$password    = "";

$conn       = mysqli_connect($server_name, $user_name, $password , $db_name);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
 /* else{
      echo "Connection successful";
  }
  */



?>