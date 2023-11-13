<?php
session_start();

    include("connection.php");

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $cname = $_POST['cname'];
    $contact_no = $_POST['contact_no'];
    $cwebsite = $_POST['cwebsite'];
    $cmail = $_POST['cmail'];
    $about = $_POST['about'];

    $sql = "INSERT INTO jobportal.employer(`eid`, `cname`, `contact_no`, `cwebsite`, `cmail`, `about`) VALUES ('" . $_SESSION['id'] . "','$cname','$contact_no','$website','$cmail','$about')";


    if($con->query($sql) == true){

        header("location: jobposted.php");

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

     // Close the database connection
     $con->close();

?>