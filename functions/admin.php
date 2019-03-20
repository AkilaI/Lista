<script text/javascript>
 function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well      
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well 
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeypress = resetTimer;   
   

    function checkFunction() {
            if(confirm("Inactive for 10 minutes Do you want to continue?")) {
                resetTimer();
            }
            else{
                window.location = 'http://localhost/Assignment/functions/logout.php?logout';
            }
        
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(checkFunction,60*10000);  // time is in milliseconds
    }
}

idleLogout();
</script>
<?php 
   session_start();
   //echo $_SESSION['adminname'];
		
	if(!isset($_SESSION['adminname']))
	{
		header('location:../index.php');
		exit;
	}
	
?>
 
 <html>
     <head>
        <link rel="stylesheet" type="text/css" href="../CSS/btstyle.css">
        <style>
            body{
                background-image: url("../images/userbg.jpg");
                background-repeat: no-repeat;
                background-size: auto;
            }




        </style>
     </head>
     <body>
         
        <p style="font-size:50px; color:green;"><?php echo $_SESSION['success']; echo $_SESSION['adminname']; ?> </p>
        
        <button type="button" class="button1" name="add" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/adminreg.php';">Add Admin </button><br><br><br>
        <button type="button" class="button3"name="viewu" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/viewusers.php';">View Users </button><br><br><br>
        <button type="button" class="button5"name="viewc" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/viewcomp.php';">View Companies </button><br><br><br>
        <button type="button" class="button2"name="deleteu" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/deleteuser.php';">Delete Users </button><br><br><br>
        <button type="button" class="button6"name="deletec" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/addelcomp.php';">Delete Companies </button><br><br><br>
        <button type="button" class="button7"name="topu" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/topusers.php';">Top Users </button><br><br><br>
        <button type="button" class="button8"name="topc" onclick="self.frames['ifadmin'].location.href ='http://localhost/Assignment/admin_functions/topcat.php';">Top Categories </button><br><br><br>
        <button type="button" onclick="location.href='http://localhost/Assignment/functions/logout.php?logout'"class="button4"name="logout">Log Out </button><br><br><br>
        <button type="button" onclick="location.href = 'http://localhost/Assignment/index.php'">Home</button>

        <iframe name="ifadmin" width ="75%" height="110%"style="float:right; margin-top:-550px;"></iframe>







</body>
</html>
