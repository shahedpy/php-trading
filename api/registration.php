<?php
session_start();
include 'include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $nid = $_POST['nid'];
  $refferal = $_POST['refferal'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  if ($password != $confirm_password) {
    $_SESSION['error_msg'] = 'Password and confirm password are not same';
  }

  $enc_pass = md5($password);


  $sql = "INSERT INTO `users` (`id`, `name`, `phone`, `nid`, `parent`, `password`) 
                        VALUES (NULL, '$name', '$phone', '$nid', '$refferal', '$enc_pass')";


  //sql for check referal okay or not
  $select_ref_sql = "SELECT `phone` FROM `users` WHERE `phone` = '" . $refferal . "'";
  $result = $conn->query($select_ref_sql);
  if (mysqli_num_rows($result)) {

    if ($conn->query($sql) === TRUE) {

      $create_wallet = "INSERT INTO `wallet` (`phone`) VALUES ('$phone')";

      if ($conn->query($create_wallet) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }


      $_SESSION['success_msg'] = 'Account created successfully';
      header('location: ../login.php');
    } else {
      $_SESSION['error_msg'] = "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    $_SESSION['error_msg'] = 'Refferal does not exists';
    header('location: ../register.php');
  }


  //Insert data

  $conn->close();
} else {
  header('location: ../register.php');
}
