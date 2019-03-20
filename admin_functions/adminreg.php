<?php include('../config/server.php')?>
<html>
    <head>
        <title>Admin SignUp</title>
		<link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
		<style>
			span{
				color:red;
			}
		</style>
    </head>
    <body>
        <div class="header">
  	        <h2>Admin SignUp</h2>
        </div>
	
        <form method="post" action="adminreg.php">

			<span> <?php foreach ($errors as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>						
      
            <div class="input_ele">
  	            <label>Admin Name</label>
  	            <input type="text" name="adminname" >
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
  	            <button type="submit" class="btn" name="reg_admin">SignUp</button>
  	        </div>
  	        
        </form>
    </body>
</html>