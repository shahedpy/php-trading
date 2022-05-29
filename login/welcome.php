<?php


if(!empty($_SESSION['username'])){?>

<?php
header('location:../dashboard/');
?>
      
<form method="POST" class="text-center">
            <button class="btn btn-danger" name="logout">Logout</button>
        </form>
        <?php }?> 
        ?>