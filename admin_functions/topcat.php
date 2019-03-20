<?php

$conn = mysqli_connect('localhost','root','','registration');

/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/

$top_query = "SELECT Category,COUNT(*) as count FROM comdetails GROUP BY Category ORDER BY count DESC";
$disp = mysqli_query($conn, $top_query);

echo("<table border='1'>");
echo("<tr>
<td>Category</td>
<td>Count</td>
</tr>");

if($disp -> num_rows > 0 ){
    while($row = $disp -> fetch_assoc()){
    echo("<tr><td>".$row['Category']."</td><td>".$row['count']."</td></tr>");
    }
    }
    echo("</table>");

