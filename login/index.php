<?php

    session_start();

    // Order of these files is IMPORTANT
    include "db.php";
    include "retrieve.php";
    include "functions.php";
    include "logic.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <title>Session Management</title>
</head>
<body>

    <?php if(empty($_SESSION['phone'])){?>
        <div class="container my-5">

            <form method="POST" class="bg-dark text-white p-5 rounded-lg">
                <h2 class="my-3 text-center text-warning">Login</h2>
                <input type="text" name="phone" placeholder="Phone" class="form-control">
                <input type="password" name="password" placeholder="Password" class="form-control mt-3">
                <button type="submit" name="login" class="btn btn-outline-light mt-3">Login</button>
            </form>
            <a href="registration.php">Create Account</a>
        </div>
    <?php }?>

    

    <!-- Visible only if logged in -->
    <?php if(!empty($_SESSION['phone'])){?>
        <div class="container text-center my-5">

        <?php


            $phone = $_SESSION['phone'];

            $sql = "SELECT * FROM users WHERE phone = $phone";

            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                
                // output data of each row
                
                while($row = $result->fetch_assoc()) {

                    $_SESSION['id'] = $row["id"];
                    $_SESSION['name'] = $row["name"];
                    $_SESSION['phone'] = $row["phone"];
                    $_SESSION['nid'] = $row["nid"];
                    $_SESSION['referral_id'] = $row["referral_id"];
                    $_SESSION['password'] = $row["password"];

                    
                }
            } else {
            
                echo "0 results";
            
            }
            
            $conn->close();

            header('location:../dashboard/');
            
        ?>


            
        </div>

    <?php }?>

</body>
</html>