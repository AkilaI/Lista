<?php

$conn = mysqli_connect('localhost','root','','registration');

/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/

$view_query = "SELECT * FROM comdetails WHERE Category='Hotel'";
$disp = mysqli_query($conn, $view_query);

echo("<table border='1'>");
echo("<tr>
<td>Company Name</td>
<td>Category</td>
<td>User</td>
<td>Experience</td>
<td>Contact</td>
<td>Image</td>
</tr>");

if($disp -> num_rows > 0 ){
    while($row = $disp -> fetch_assoc()){
    echo("<tr><td>".$row['companyname']."</td><td>".$row['location']."</td><td>".$row['username']."</td><td>".$row['experience']."</td><td>".$row['contact']."</td><td><img height=150px width=150px src= http://localhost/Assignment/upimages/".$row['image']."></td></tr>");
    }
    }
    echo("</table>");
    ?>
    <html>
        <head>
            <style>
                body{
                     background-image: url("../images/catbg.jpg");
                     background-repeat: no-repeat;
                     background-size: cover;
                    }
            </style>
        </head>
    
    <body>
    </body>
    </html>
    
    