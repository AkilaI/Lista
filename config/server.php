<?php
session_start();

$username = "";
$email    = "";
$errors = []; 
$_SESSION['success'] = "";
$out = "";
$num_rows="";

// connect to the database
$conn = mysqli_connect('localhost','root','','registration');

// check connection
/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/

// REGISTER USER
if (isset($_POST['reg_user'])) {
  
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username= '$username' OR email= '$email'";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc( $result);


// sql query check
 /* if ($result) {
     $result = mysqli_fetch_assoc($result);
     echo "$result";
  }
  else {
     echo mysqli_error($conn);
  }
  return $result;*/
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors,"Username already exists");
            }
            if ($user['email'] === $email) {
                array_push($errors,"email already exists");
            }
        }

        if(empty($username)){
            array_push($errors,"Username is Required");
        }

        if(empty($email)){
            array_push($errors,"Email is Required");
        }
   
        if(empty($password_1)){
            array_push($errors,"Password is Required");
        }

        if(strlen($password_1)<8){
            array_push($errors,"Password should be atleast 8 characters");
        }
   
        if ($password_1!=$password_2){
            array_push($errors,"Password does not match");
        }
//echo count($errors);


  // Add data to database if there are no errors
        if (count($errors) == 0) {
    	    $pswd = md5($password_1);//encrypt the password before saving in the database
            $query = "INSERT INTO users (username,email,password) 
  			          VALUES('$username', '$email', '$pswd')";
  	        mysqli_query($conn, $query);
            $_SESSION['username'] = $username;
  	        $_SESSION['success'] = "You are now logged in";
  	//header('location: index.php');
        }
}

//Log in

if(isset($_POST['log_user'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
   

    if(empty($username)){
        array_push($errors,"Username is Required");    
    }

    if(empty($password_1)){
         array_push($errors,"Password is Required");
        
    }

    if(count($errors)==0){
        $password = md5($password_1);
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $out = mysqli_query ($conn, $query);
        $num_rows = mysqli_num_rows($out);
      
    }

    if($num_rows==1){
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are logged in as :  ";
        header('location:user.php');
    }else{
         array_push($errors, "Wrong username/password combination");
        
        }


    



}

// RegisterAdmin
if (isset($_POST['reg_admin'])) {
  
    $adminname = mysqli_real_escape_string($conn, $_POST['adminname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    echo "$adminname";
    
     
      // first check the database to make sure 
      // an admin does not already exist with the same username and/or email
    $admin_check_query = "SELECT * FROM admins WHERE adminname= '$adminname' OR email= '$email'";
    $rest = mysqli_query($conn, $admin_check_query);
    $admin = mysqli_fetch_assoc( $rest);

    echo "$admin";
    
    
    // sql query check
     /* if ($result) {
         $result = mysqli_fetch_assoc($result);
         echo "$result";
      }
      else {
         echo mysqli_error($conn);
      }
      return $result;*/
    
    if ($admin) { // if user exists
        if ($admin['adminname'] === $adminname) {
            array_push($errors,"Admin name already exists");
        }

        if ($admin['email'] === $email) {
            array_push($errors,"email already exists");
        }
    }
      
        if(empty($adminname)){
            array_push($errors,"Admin name is Required"); 
        }
        
        if(empty($email)){
            array_push($errors,"Email is Required");
        }
       
        if(empty($password_1)){
            array_push($errors,"Password is Required");
        }
    
        if(strlen($password_1)<8){
            array_push($errors,"Password should be atleast 8 characters");
        }

        if ($password_1!=$password_2){
            array_push($errors,"Password does not match");
        }
    
        //echo count($errors);
    
    
      // Add data to database if there are no errors
        if (count($errors) == 0) {
            $pswd = md5($password_1);//encrypt the password before saving in the database
            $query = "INSERT INTO admins (adminname,email,password) 
                      VALUES('$adminname', '$email', '$pswd')";
            mysqli_query($conn, $query);
            $_SESSION['adminname'] = $adminname;
            $_SESSION['success'] = "You are now logged in";
          
        }
    }
    
    //Log in
    
        if(isset($_POST['log_admin'])){
            $adminname = mysqli_real_escape_string($conn, $_POST['adminname']);
            $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
            
    
            if(empty($adminname)){
                array_push($errors,"Username is Required");
            }
            if(empty($password_1)){
                array_push($errors,"Password is Required");
            }

           
          
            if(count($errors)==0){
                $password = md5($password_1);
                $query = "SELECT * FROM admins WHERE adminname = '$adminname' AND password = '$password'";
                $out = mysqli_query ($conn, $query);
                $num_rows = mysqli_num_rows($out);
            }

            
    
            if($num_rows==1){
                    $_SESSION['adminname'] = $adminname;
                    $_SESSION['success'] = "You are logged in as :  ";
                     header('location:admin.php');
                
                
            }else{
                array_push($errors, "Wrong username/password combination");
            }
    
    
        
    
    
    
        }

?>