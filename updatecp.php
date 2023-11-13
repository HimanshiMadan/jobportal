<?php
session_start();

include("connection.php");

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
    $cname = $_POST['cname'];
    $about = $_POST['about'];
    $cwebsite = $_POST['cwebsite'];
    $contact_no = $_POST['contact_no'];
    $cmail = $_POST['cmail'];
    

    $update_sql = "UPDATE jobportal.employer SET 
               cname = '$cname', 
               about = '$about', 
               cwebsite = '$cwebsite', 
               contact_no = '$contact_no', 
               cmail = '$cmail' 
               WHERE eid = '" . $_SESSION['id'] . "'";


    if($con->query($update_sql) == true){

        header("location: updatecpform.php");
        exit();
    }
    else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
else{
    header("location: login.html");
}
$con->close();
?>