<?php

$conn = mysqli_connect('localhost','root','','registration');

$err = array();

/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/

if (isset($_POST['del_det'])) {

$companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
$id = mysqli_real_escape_string($conn, $_POST['id']);

$check_query = "SELECT * FROM comdetails WHERE companyname= '$companyname' AND id= '$id'";
$result = mysqli_query($conn, $check_query);
$idcomp = mysqli_fetch_assoc( $result);

if(empty($id)){
    array_push($err,"ID is Required");
    
}

if(empty($companyname)){
    array_push($err,"Company name is Required");
}

if (count($err) == 0) {
    $query2 = "DELETE FROM comdetails WHERE id='$id' AND companyname='$companyname'";
               
    mysqli_query($conn, $query2);
}
}
?>




<html>
    <head>
        <title>Delete Entry </title>
        <style>
            span{
                color:red;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
    </head>
    <body>
        <div class="header">
  	        <h2>Delete Company</h2>
        </div>
	
        <form method="post" action="addelcomp.php" name="delcomp">
            <span> <?php foreach ($err as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>
      
      
            <div class="input_ele">
  	            <label>Entry ID</label>
  	            <input type="text" name="id" >
  	        </div>
  	        <div class="input_ele">
  	            <label>Company Name</label>
  	            <input type="text" name="companyname" >
              </div>
              <div class="input_ele">
  	            <button type="submit" class="btn" name="del_det">Delete</button>
  	        </div>