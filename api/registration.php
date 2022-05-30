<?php
include 'include.php';





// include 'include.php';

// if($_SERVER['REQUEST_METHOD'] == 'POST' ){

//     $name = $_POST['name'];
//     $phone = $_POST['phone'];
//     $nid = $_POST['nid'];
//     $refferal = $_POST['refferal'];
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];

//     if($password != $confirm_password){
//         echo 'Password and confirm password are not same';
//     }

//     $enc_pass = md5($password);


//     $sql = "INSERT INTO `users` (`id`, `name`, `phone`, `nid`, `referral_id`, `password`) 
//                         VALUES (NULL, '$name', '$phone', '$nid', '$refferal', '$enc_pass')";

    

// if ($conn->query($sql) === TRUE) {



//   //read data


//   //create data






//   } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
//   }
  
//   $conn->close();


// } else {
//     header('location: ../login/registration.php');
// }