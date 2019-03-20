<?php
session_start();



$err = array();
$username = $_SESSION['username'];


$conn = mysqli_connect('localhost','root','','registration');

/*if(mysqli_connect_errno()){
die('database connection failed'.mysqli_connect_error());
}else{
echo "connection successful";
}*/



// User Add Company


if (isset($_POST['add_det'])) {
    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']); 
    $experience = mysqli_real_escape_string($conn, $_POST['experience']);
    $category=$_POST["category"];
    $img=($_FILES['comimage']['name']);

    $target="../upimages/";
    $target=$target.basename($_FILES['comimage']['name']);

    $comp_check_query = "SELECT * FROM comdetails WHERE companyname= '$companyname' OR location= '$location'";
    $result = mysqli_query($conn, $comp_check_query);
    $comp = mysqli_fetch_assoc( $result);

    if ($comp) { // if company exists
        if ($comp['companyname'] === $companyname && $comp['contact']=== $contact)  {
            array_push($err,"Company already exists");
        }
    }
    $img_check_query = "SELECT * FROM comdetails WHERE image='$img'";
    $imresult = mysqli_query($conn,$img_check_query);
    $imgc = mysqli_fetch_assoc($imresult);
    
    if($img!=""){
        if($imgc['image']===$img){
            array_push($err,"Image name already exists");
        }
    }   

    if(empty($companyname)){
        array_push($err,"Company name is Required");
    }

    
    if(empty($location)){
        array_push($err,"Location is Required");
    }

    if (count($err) == 0) {
        $query1 = "INSERT INTO comdetails (companyname,location,Category,username,experience,contact,image) 
        VALUES('$companyname', '$location','$category','$username','$experience','$contact','$img')";
        mysqli_query($conn, $query1);
        
        
        if(move_uploaded_file($_FILES['comimage']['tmp_name'],$target)) { 
            echo "The file has been uploaded, and your information has been added to the directory"; 
        } 
        else { 
        echo "You have not uploaded an image"; 
        } 

    }


}

// User Delete Company

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
