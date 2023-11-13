<?php
session_start();
    include("connection.php");

    if(isset($_SESSION['id'])){

        if(!$con){
            die("connection to this database failed due to" . mysqli_connect_error());
        }
    
        $jobtitle = $_POST['jobtitle'];
        $min_qual = $_POST['min_qual'];
        $techstack = $_POST['techstack'];
        $jobdesc = $_POST['jobdesc'];
    
        $sql = "INSERT INTO jobportal.job(`eid`, `jobtitle`, `min_qual`, `techstack`, `jobdesc`) VALUES ('" . $_SESSION['id'] . "','$jobtitle','$min_qual','$techstack','$jobdesc');";
    
    
        if($con->query($sql) == true){
    
            header("location: jobposted.php");
    
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    
         // Close the database connection
         $con->close();

    }
    else{
        header("location: login.html");
    }

?>