<?php
include 'include.php';



if($_SERVER['REQUEST_METHOD'] == 'POST' ){

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $nid = $_POST['nid'];
    $refferal = $_POST['refferal'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password != $confirm_password){
        echo 'Password and confirm password are not same';
    }

    $enc_pass = md5($password);


    $sql = "INSERT INTO `users` (`id`, `name`, `phone`, `nid`, `referral_id`, `password`) 
                        VALUES (NULL, '$name', '$phone', '$nid', '$refferal', '$enc_pass')";


//sql for check referal okay or not

$select_ref_sql = "SELECT `phone` FROM `users` WHERE `phone` = '".$refferal."'";
$result = $conn->query($select_ref_sql);
if (mysqli_num_rows($result)){
  if ($conn->query($sql) === TRUE) {
    echo 'Data inserted';
  
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
} else {
  echo 'refferal does not exists';
}


//Insert data

$conn->close();


} else {
  header('location: ../register.html');
}