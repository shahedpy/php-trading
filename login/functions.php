<?php

    function login($conn, $phone, $password){
        $sql = "SELECT * FROM users WHERE phone = '$phone'";
        $query = mysqli_query($conn, $sql);
        return $query;    
    }

?>