<?php
include 'include.php';
$get_voucher_rate = "SELECT `meta_value` FROM `system_info` WHERE `meta_field` = 'voucher_rate'";
$result = mysqli_query($conn, $get_voucher_rate);
$voucher_rate = 0;
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $voucher_rate = $row['meta_value'];
    }
}
