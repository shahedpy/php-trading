<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'include.php';

    $user = $_POST['user_id'];
    $amount = $_POST['amount'];
    $balance = 0;

    //check balance of user
    $check_balance_sql = "SELECT `amount` FROM `wallet` WHERE phone = '$user'";
    $result = $conn->query($check_balance_sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $balance = $row['amount'];
        }
    }

    if ($balance < $amount) {
        $_SESSION['error_msg'] = 'You do not have sufficient balance.';
        header('location: ../dashboard');
    } else {

        //check if already a request in pending
        $check_pending_req_sql = "SELECT `user` FROM `withdraw` WHERE `user` = '$user' AND `status`= 0 ";
        $check_pending_result = $conn->query($check_pending_req_sql);

        if ($check_pending_result->num_rows > 0) {
            $_SESSION['error_msg'] = 'You already have a pending request.';
            header('location: ../dashboard');
        } else {
            //deduct from balance
            $new_balance = $balance - ($amount + $amount * 0.2);
            $update_balace_sql = "UPDATE `wallet` SET `amount` = '$new_balance' WHERE `wallet`.`phone` = '$user'";
            if ($conn->query($update_balace_sql) === TRUE) {
            } else {
                echo "Error updating record: " . $conn->error;
            }

            //add to request list
            $withdraw_sql = "INSERT INTO `withdraw` (`user`, `amount`) VALUES ('$user', '$amount')";

            if ($conn->query($withdraw_sql) === TRUE) {
                $_SESSION['success_msg'] = "Your request is now in pending.";
                header('location: ../dashboard');
            } else {
                echo "Error: " . $withdraw_sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
} else {
    header('location: ../dashboard');
}
