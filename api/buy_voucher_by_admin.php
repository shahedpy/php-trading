<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'include.php';

    $user_id = $_POST['user_id'];
    $voucher_qty = $_POST['voucher_qty'];

    for ($i = 0; $i < $voucher_qty; $i++) {
        $add_voucher = "INSERT INTO `voucher` (voucher_limit, owned_by) VALUES (8, '$user_id')";
        if ($conn->query($add_voucher) === TRUE) {

            $_SESSION['success'] = 'Voucher send successfully';

            header('location: ../admin/');
        } else {
            echo "Error: " . $add_voucher . "<br>" . $conn->error;
        }



        //          


    }
    echo $err;
} else {
    header('location: ../admin/');
}
