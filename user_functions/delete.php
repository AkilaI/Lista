<?php  include('../config/detmanage.php')?>


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
  	        <h2>Delete Form</h2>
        </div>
	
        <form method="post" action="delete.php" name="delcomp">
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