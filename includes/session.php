<?php

session_start();

require_once 'connection.php';

 if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query    = "SELECT * FROM tblusers WHERE user_name = '$username' and user_password = '$password'";
    
    $results  = mysqli_query($conn, $query); 

    if(mysqli_num_rows($results) != 0)
    {
        echo "login successful";
        $_SESSION['user'] = $username;
        header('location:index.php');
    }
    else{
        $error = "login failed";
        $_SESSION['user'] = $$error;
        header('location:../login.php');
    }

 }