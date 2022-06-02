<?php
session_start();
include 'include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $voucher_id = $_POST['voucher_id'];
    $owner = $_SESSION['phone'];

    $sql = "INSERT INTO `leaderboard` (voucher,hitted_by) VALUES ('$voucher_id', '$owner')";

    $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        header('location: ../dashboard/leaderboard.php');
      
      } else {
        $_SESSION['error_msg'] = "Error: " . $sql . "<br>" . $conn->error;
      }
} else {
    header('location: ../dashboard/voucher.php');
}
