<?php

$conn = mysqli_connect('localhost','root','','registration');

/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/

$view_query = "SELECT * FROM users ";
$disp = mysqli_query($conn, $view_query);

echo("<table border='1'>");
echo("<tr>
<td>ID</td>
<td>User Name</td>
<td>email</td>
</tr>");

if($disp -> num_rows > 0 ){
while($row = $disp -> fetch_assoc()){
echo("<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['email']."</td></tr>");
}
}
echo("</table>");

