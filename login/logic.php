<?php

    if(isset($_REQUEST['login'])){
        $results = login($conn, $phone, $password);

        foreach($results as $r){

            $pwd_check = password_verify($password, $r['password']);

            if($pwd_check){
                $_SESSION['phone'] = $r['phone'];
            }
        
        }
    }

    if(isset($_REQUEST['logout'])){
        session_destroy();
        header("location:../");
        exit();
    }

?>