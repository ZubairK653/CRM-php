<?php 

require 'connection.php';

session_start();

$firstname = $lastname  = $email = $username = $Errors = "";
 
if(isset($_POST['save'])){
    
    if(isset($_POST['username']) && ($_POST['username'] != '') && isset($_POST['password']) && ($_POST['password'] != '')
    && isset($_POST['email']) && ($_POST['email'] != '') && isset($_POST['firstname']) && ($_POST['firstname'] != '') && isset($_POST['lastname']) && ($_POST['lastname'] != '') 
     )
    {  
        $username      = $_POST['username'];
        $password      = $_POST['password'];
        $firstname     = $_POST['firstname'];
        $lastname      = $_POST['lastname'];
        $email         = $_POST['email'];

        $userpassword = password_hash($password, PASSWORD_DEFAULT);
        

        $query     = "INSERT INTO tblusers (user_name, user_password , user_email, first_name, last_name , user_role , user_status) VALUES
        ('$username', '$userpassword' , '$email' , '$firstname' , '$lastname' , 'user' , 1 )";

       $results = mysqli_query($conn , $query);

        if($results){
            $mesage = "inserted";
            header('location: ../view-users.php?mess='.$mesage);
        }

        else{

           $error = "Not-inserted";
           header('location: ../add.php?err='.$error);
        }
    }
    else{
         $error = "Empty-fields";
         header('location: ../add.php?err='.$error);
    }

}

?>

