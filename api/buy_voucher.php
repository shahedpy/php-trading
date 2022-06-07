<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'include.php';

    $user_id = $_POST['user_id'];
    $voucher_qty = $_POST['voucher_qty'];


    //dynamic voucher_rate
    $get_voucher_rate = "SELECT `meta_value` FROM `system_info` WHERE `meta_field` = 'voucher_rate'";
    $result = $conn->query($get_voucher_rate);
    $voucher_rate = 0;
    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            $voucher_rate = $row['meta_value'];
        }
    }


    $voucher_amount = $voucher_qty * $voucher_rate;
    $wallet_balance = 0;
    $err = "";

    for ($i = 0; $i < $voucher_qty; $i++) {
        $select_amount_sql = "SELECT amount FROM `wallet` WHERE `phone` = '$user_id' ";
        $result = $conn->query($select_amount_sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $wallet_balance =  $row["amount"];
            }
        } else {
            echo "0 results";
        }



        if ($wallet_balance < $voucher_amount) {
            $err = 'You don\'t have available balance';
        } else {
            echo 'Okay';

            $new_balance = $wallet_balance - $voucher_rate;

            $update_wallet_sql = "UPDATE `wallet` SET `amount` = '$new_balance' WHERE `wallet`.`phone` = '$user_id';";

            if ($conn->query($update_wallet_sql) === TRUE) {


                $add_voucher = "INSERT INTO `voucher` (voucher_limit, owned_by) VALUES (8, '$user_id')";

                if ($conn->query($add_voucher) === TRUE) {
                    header('location: ../dashboard/voucher.php');
                } else {
                    echo "Error: " . $add_voucher . "<br>" . $conn->error;
                }
            } else {
                echo "Error updating record: " . $conn->error;
            }


            //          

        }
    }
    echo $err;
} else {
    header('location: ../dashboard/voucher.php');
}
