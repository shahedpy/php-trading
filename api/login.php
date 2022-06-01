<?php
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);

    include_once 'include.php';

    

    //SQL Query
    $SQL = "SELECT * FROM `users` WHERE `phone`='$phone' AND `password`='$password'";

    //Perform Query
    if ($result = $conn -> query($SQL)) {
        
        if($result->num_rows==1){

            $row = $result->fetch_assoc();
            

            $_SESSION['name'] = $row['name'];
            $_SESSION['phone'] = $phone;

            
            header("location: ../dashboard");

            

        } else {
            $_SESSION['error_message'] = "Username or Password Error!";
            header('location: ../login.php');
        }
        
      } else {
          $_SESSION['error_message'] = $mysqli -> error;
          header('location: ../login.php');
      }

    

} else {
    header("location: ../");
}