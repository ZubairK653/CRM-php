<?php
session_start();
require_once 'connection.php';

 if(isset($_POST['login']))
 {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query    = "SELECT * FROM tblusers WHERE user_name = '$username'";

   // $passwordhash = $password;
    
    $results  = mysqli_query($conn, $query); 
     
     // User records found
    if(mysqli_num_rows($results) >= 1)
    {
        while($row = mysqli_fetch_array($results))
        {
            
            $userrole      = $row['user_role']; 
            $userpassword  = $row['user_password'];
        }
        // If user is admin
        if($userrole == "admin")
        {
            if(password_verify($password, $userpassword)) 
            {
                $_SESSION['user'] = $username;
                header('location:../index.php');
            }
            else
            {
                $error = "login failed";
                $_SESSION['error'] = $error;
                header('location:../login.php');
            }
        }
        // user is not admin
        else
        {
            if(password_verify($password, $userpassword)) 
            {
                $_SESSION['user'] = $username;
                header('location:../dashboard.php');
            }
            else
            {
                $error = "login failed";
                $_SESSION['error'] = $error;
                header('location:../login.php');
            }
        }
        
    }
    // If no user found
    else
    {
        $error = "login failed";
        $_SESSION['error'] = $error;
        header('location:../login.php');
    }

}