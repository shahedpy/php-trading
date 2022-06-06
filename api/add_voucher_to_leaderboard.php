<?php
session_start();
include 'include.php';

//check post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //posted data
  $voucher_id = $_POST['voucher_id'];
  $owner = $_SESSION['phone'];

  //insert data to leaderboard SQL
  $insert_to_lb_sql = "INSERT INTO `leaderboard` (voucher,hitted_by) VALUES ('$voucher_id', '$owner')";

  if ($conn->query($insert_to_lb_sql) === TRUE) {

    // -------------------- voucher added to leaderboard

    // change voucher status
    $change_voucher_status_sql = "UPDATE `voucher` SET `status` = '1' WHERE `voucher`.`id` = '$voucher_id';";

    if ($conn->query($change_voucher_status_sql) === TRUE) {

      echo 'successfully changed!';
    }



    //update voucher limit
    $limit_sql = "SELECT `voucher_limit` FROM `voucher` WHERE `id` = '$voucher_id'";

    $result = mysqli_query($conn, $limit_sql);

    if ($result->num_rows > 0) {

      $limit = 0;

      while ($row = $result->fetch_assoc()) {
        $limit = $row['voucher_limit'];
      }

      $limit--;


      $update_limit_sql = "UPDATE `voucher` SET `voucher_limit` = '$limit' WHERE `voucher`.`id` = '$voucher_id'";

      if ($conn->query($update_limit_sql) === TRUE) {





        $row_count_sql = "SELECT * FROM `leaderboard`";
        $result = mysqli_query($conn, $row_count_sql);


        if ($result->num_rows > 2) {

          $a = array();

          while ($row = $result->fetch_assoc()) {
            array_push($a, $row['id']);
          }

          $lead_id = $a[0];

          $select_leader_sql = "SELECT * FROM `leaderboard` WHERE `id`='$lead_id'";
          $result = mysqli_query($conn, $select_leader_sql);

          if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

              //Leader ID
              $lead_phone = $row["hitted_by"];

              //get leader data
              $get_user_data =  "SELECT `parent` FROM `users` WHERE `phone` = '$lead_phone'";
              $result = mysqli_query($conn, $get_user_data);

              if ($result->num_rows > 0) {

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                  $lead_parent_phone = $row["parent"];


                  //ADD AWARD TO LEADER
                  //echo $lead_phone . '<br>';
                  //leader_balance
                  $get_leader_bal_sql = "SELECT * FROM `wallet` WHERE `phone` = '$lead_phone'";
                  $result = mysqli_query($conn, $get_leader_bal_sql);
                  if ($result->num_rows > 0) {

                    $leader_balance = 0;
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                      $leader_balance = $row['amount'];
                    }
                  }

                  //add 18% of voucher rate
                  $leader_balance += 108;

                  $add_award_to_leader_sql = "UPDATE `wallet` SET `amount` = '$leader_balance' WHERE `wallet`.`phone` = $lead_phone;";

                  if ($conn->query($add_award_to_leader_sql) === TRUE) {

                    //ADD AWARD TO LEADER PARENT
                    //echo $lead_parent_phone;

                    //echo 'Reward added to leader wallet<br>';

                    //leader_parent_balance
                    $get_leader_parent_bal_sql = "SELECT * FROM `wallet` WHERE `phone` = '$lead_parent_phone'";
                    $result = mysqli_query($conn, $get_leader_parent_bal_sql);
                    if ($result->num_rows > 0) {

                      $leader_parent_balance = 0;
                      // output data of each row
                      while ($row = $result->fetch_assoc()) {
                        $leader_parent_balance = $row['amount'];
                      }
                    }

                    $leader_parent_balance += 30;

                    //echo $leader_parent_balance;
                    $add_award_to_leader_parent_sql = "UPDATE `wallet` SET `amount` = '$leader_parent_balance' WHERE `wallet`.`phone` = '$lead_parent_phone';";
                    if ($conn->query($add_award_to_leader_parent_sql) === TRUE) {
                      //echo 'Reward added to parent wallet';



                      //REMOVE LEADER FROM LEADERBOARD;
                      $remove_leader_sql = "DELETE FROM `leaderboard` WHERE `leaderboard`.`id` = '$lead_id'";

                      if ($conn->query($remove_leader_sql) === TRUE) {



                        //change voucher status
                        $change_voucher_status_sql = "UPDATE `voucher` SET `status` = '0' WHERE `voucher`.`owned_by` = '$lead_phone';";

                        if ($conn->query($change_voucher_status_sql) === TRUE) {

                          echo 'successfully changed!';
                        }






                        //header to leadboard
                        header('location: ../dashboard/leaderboard.php');
                      } else {
                        echo "Error deleting record: " . $conn->error;
                      }
                    }
                  }
                }
              }
            }
          } else {
            echo "0 results";
          }
        } else {
          header('location: ../dashboard/leaderboard.php');
        }
      }
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} else {
  header('location: ../dashboard/voucher.php');
}





//if leader board has more than two people