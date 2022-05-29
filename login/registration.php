<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles/styles.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<form method="post" action="../api/registration.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <div class='form-group'>
    <label for="name"><b>Name</b></label>
    <input type="text" class='form-control' placeholder="Enter Name" name="name" id="name" required>
    </div>
    

    <div class='form-group'>
    <label for="name"><b>Phone</b></label>
    <input type="text" class='form-control' placeholder="Enter Phone" name="phone" id="name" required>
    </div>
    
    <div class='form-group'>
    <label for="name"><b>NID</b></label>
    <input type="text" class='form-control' placeholder="Enter NID" name="nid" id="name" required>
    </div>

    
    <div class='form-group'>
    <label for="name"><b>Refferal</b></label>
    <input type="number" class='form-control' placeholder="Enter Refferal" name="refferal" id="name" required>
    </div>

    <div class='form-group'>
    <label for="name"><b>Password</b></label>
    <input type="password" class='form-control' placeholder="Enter Password" name="password" id="name" required>
    </div>


    <div class='form-group'>
    <label for="name"><b>Confirm Password</b></label>
    <input type="password" class='form-control' placeholder="Enter Password Again" name="confirm_password" id="name" required>
    </div>

    
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
 </form>

</body>
</html>
