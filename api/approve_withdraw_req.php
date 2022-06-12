<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'include.php';

    $withdraw_id = $_POST['withdraw-id'];

    $sql = "UPDATE `withdraw` SET `status`='1' WHERE `id`='$withdraw_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header('location: ../admin/withdraw_history');
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    header('location: ../admin/withdraw.php');
}
