<?php include('../config/server.php')?>
<html>
    <head>
		<title>SignUp</title>
		<style>
			span{
				color: red;
			}
		</style>
        <link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
    </head>
    <body background="../images/lgback.jpg">
        <div class="header">
  	        <h2>SignUp</h2>
        </div>
	
        <form method="post" action="register.php">

			<span> <?php foreach ($errors as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>
      
            <div class="input_ele">
  	            <label>Username</label>
				  <input type="text" name="username" >
				 
  	        </div>
  	        <div class="input_ele">
  	            <label>Email</label>
  	            <input type="email" name="email" >
  	        </div>
  	        <div class="input_ele">
  	            <label>Password</label>
  	            <input type="password" name="password_1">
  	        </div>
  	        <div class="input_ele">
  	            <label>Confirm password</label>
  	            <input type="password" name="password_2">
  	        </div>
  	        <div class="input_ele">
  	            <button type="submit" class="btn" name="reg_user">SignUp</button>
  	        </div>
  	        <p>Already a member? <a href="login.php">Log in</a></p>
        </form>
    </body>
</html>