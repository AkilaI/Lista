<?php
 include('../config/server.php')
    ?>
<html>
    <head>
        <title>Admin Log In</title>
        <style>
            span{
                color:red;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
    </head>
    <body background = "../images/userbg.jpg">
        <div class="header">

  	        <h2>Log In</h2>
        </div>

        <form method="post" action="adminlogin.php">

            <span> <?php foreach ($errors as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>
            <div class="input_ele">
  	            <label>Username</label>
  	            <input type="text" name="adminname" >
            </div>

            <div class="input_ele">
  	            <label>Password</label>
  	            <input type="password" name="password_1">
            </div>

             <div class="input_ele">
  	            <button type="submit" class="btn" name="log_admin">Log In</button>
            </div>
            
        </form>
    </body>
</html>    
              
              
