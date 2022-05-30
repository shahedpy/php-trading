<?php

//DATABASE
$SERVER = "localhost";
$USER = "root";
$PASS = "";
$DB = "project";

//Connection
$conn = mysqli_connect($SERVER, $USER, $PASS, $DB);

//Check Connection
if($conn->connect_errno){
    echo 'Failed to connect database:'.$mysqli->connect_error;
}