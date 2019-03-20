<?php 
include('../config/detmanage.php')

 ?>
<html>
    <head>
        <title>Add Company</title>
        <style>
            span{
                color:red;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../CSS/frstyle.css">
    </head>
    <body>
        <div class="header">
  	        <h2>Add Company</h2>
        </div>
	
        <form method="post" action="addcom.php" name="addcomp" enctype="multipart/form-data" >
            <span> <?php foreach ($err as $arrayItem) {
				echo nl2br("$arrayItem\n");}?></span>
      
      
            <div class="input_ele">
  	            <label>Company Name</label>
  	            <input type="text" name="companyname" >
  	        </div>
  	        <div class="input_ele">
  	            <label>Location (Nearest City)</label>
  	            <input type="text" name="location" >
  	        </div>
  	        <div class="input_ele">
                  <label>Contact Number</label>
                  <input type="text" name="contact" >      
            </div>
            <div class="input_ele">
                  <label>Experience</label>
                  <input type="text" name="experience" >      
            </div>
  	        <div class="input_ele">
  	            <label>Category</label>
  	            <select name = "category">
                      <option value="Bank">Bank</option>
                      <option value="Hospital">Hospital</option>
                      <option value="Hotel">Hotel</option>
                      <option value="Fashion">Fashion</option>
                      <option value="Supermarket">Super Market</option>
                      <option value="Hardware">Hardware</option>
                      <option value="Telecom">Tele Communication</option>
                      <option value="Other">Other</option>
                </select>   
            </div>
            
                <input type="file" name="image">
            
  	        <div class="input_ele">
  	            <button type="submit" class="btn" name="add_det">Submit</button>
            </div>
            
            </body>
        </form
</html>