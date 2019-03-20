<?php
$conn = mysqli_connect('localhost','root','','registration');

$err = array();

/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/
 
if (isset($_POST['del_user'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $check_query = "SELECT * FROM users WHERE username= '$username' AND id= '$id'";
    $result = mysqli_query($conn, $check_query);
    $idcomp = mysqli_fetch_assoc( $result);

    if(empty($id)){
        array_push($err,"ID is Required");
    }

    if(empty($username)){
        array_push($err,"User name is Required");
    }

    if (count($err) == 0) {
        $query2 = "DELETE FROM users WHERE id='$id' AND username='$username'";
                   
        mysqli_query($conn, $query2);
    }
}




    
?>


<html>
    <head>
        <title>Delete Entry </title>
        <style>
            span{
                color:red
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
    </head>
    <body>
        <div class="header">
  	        <h2>Delete User</h2>
        </div>
	
        <form method="post" action="deleteuser.php" name="deluser">
            <span> <?php foreach ($err as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>
      
      
            <div class="input_ele">
  	            <label>User ID</label>
  	            <input type="text" name="id" >
  	        </div>
  	        <div class="input_ele">
  	            <label>User Name</label>
  	            <input type="text" name="username" >
              </div>
              <div class="input_ele">
  	            <button type="submit" class="btn" name="del_user">Delete</button>
  	        </div>
        </form>
    </body>
</html>