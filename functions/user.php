<script text/javascript>
 function idleLogout() {
    var t;
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer;  // catches touchscreen presses as well      
    window.ontouchstart = resetTimer; // catches touchscreen swipes as well 
    window.onclick = resetTimer;      // catches touchpad clicks as well
    window.onkeypress = resetTimer;   
   

    function yourFunction() {
            if(confirm("Inactive for 10 minutes Do you want to continue?")) {
                resetTimer();
            }
            else{
                window.location = 'http://localhost/Assignment/functions/logout.php?logout';
            }
        
    }

    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(yourFunction,60*10000);  // time is in milliseconds
    }
}

idleLogout();
</script>

<?php 

    session_start();
   //echo $_SESSION['username'];
		
	if(!isset($_SESSION['username']))
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
         
        <p style="font-size:50px; color:green;"><?php echo $_SESSION['success']; echo $_SESSION['username']; ?> </p>
        
        <button type="button" class="button1" name="add" onclick="self.frames['ifuser'].location.href ='http://localhost/Assignment/user_functions/addcom.php';">Add Company </button><br><br><br>
        <button type="button" class="button3"name="view" onclick="self.frames['ifuser'].location.href ='http://localhost/Assignment/user_functions/view.php';">Upload History </button><br><br><br>
        <button type="button" class="button2"name="delete" onclick="self.frames['ifuser'].location.href ='http://localhost/Assignment/user_functions/delete.php';">Delete Company </button><br><br><br>
        <button type="button" onclick="location.href='http://localhost/Assignment/functions/logout.php?logout'"class="button4"name="logout">Log Out </button><br><br><br>
        <button type="button" onclick="location.href = 'http://localhost/Assignment/index.php'">Home</button>

        <iframe name="ifuser" width ="75%" height="110%"style="float:right; margin-top:-270px;"></iframe>







</body>
</html>