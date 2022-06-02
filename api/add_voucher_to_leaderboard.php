<?php
session_start();
include 'include.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $voucher_id = $_POST['voucher_id'];
  $owner = $_SESSION['phone'];

  $sql = "INSERT INTO `leaderboard` (voucher,hitted_by) VALUES ('$voucher_id', '$owner')";

  $result = $conn->query($sql);
  if ($conn->query($sql) === TRUE) {

    $limit_sql = "SELECT `voucher_limit` FROM `voucher` where `id` = '$voucher_id'";

    $result = mysqli_query($conn, $limit_sql);

    if ($result->num_rows > 0) {

      $limit = 0;

      while ($row = $result->fetch_assoc()) {
        $limit = $row['voucher_limit'];
      }

      $limit--;


      $update_limit_sql = "UPDATE `voucher` SET `voucher_limit` = '$limit' WHERE `voucher`.`id` = '$voucher_id'";

      if ($conn->query($update_limit_sql) === TRUE) {








        //get previous row count
        // $countSql = "SELECT * FROM `leaderboard`";
        // $result = $conn->query($countSql);

        // if ($result->num_rows > 0) {
        //   // output data of each row
        //   while ($row = $result->fetch_assoc()) {
        //     echo $row["id"]."<br>";
        //   }
        // }




        //get data from row

        //select parent

        //add amount to parent

        //add amount to refferer




        //header('location: ../dashboard/leaderboard.php');

      } else {
        echo "Error updating record: " . $conn->error;
      }

      $conn->close();
    }
  } else {
    $_SESSION['error_msg'] = "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  header('location: ../dashboard/voucher.php');
}
