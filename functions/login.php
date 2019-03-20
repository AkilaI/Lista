<?php

 include('../config/server.php')

 ?>

 <?php

 if(isset($_SESSION['username'])){
    header('location:user.php');
    }
    ?>
<html>
    <head>
        <title>Log In</title>
        <style>
            span{
                color:red;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
    </head>
    <body background="../images/lgback.jpg">
        <div class="header">
  	        <h2>Log In</h2>
        </div>

        <form method="post" action="login.php">

            <span> <?php foreach ($errors as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>
      
            <div class="input_ele">
  	            <label>Username</label>
  	            <input type="text" name="username" >
            </div>

            <div class="input_ele">
  	            <label>Password</label>
  	            <input type="password" name="password_1">
            </div>

             <div class="input_ele">
  	            <button type="submit" class="btn" name="log_user">Log In</button>
            </div>
            <p> Not a Member? <a href = "register.php"> SignUp </p>
            <p><a href = "adminlogin.php"> Log In as Admin</a></p>
        </form>
    </body>
</html>    
              
              
