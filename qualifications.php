<?php
session_start();

    include("connection.php");

    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

    $degree = $_POST['degree'];
    $about = $_POST['about'];
    $exp = $_POST['exp'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $skills = $_POST['skills'];
    $past_position = $_POST['past_position'];
    $contact_mail = $_POST['contact_mail'];

    $sql = "INSERT INTO jobportal.job_seeker(`sid`, `degree`, `about`, `exp`, `gender`, `district`, `state`, `country`, `skills`, `past_position`, `contact_mail`) VALUES ('" . $_SESSION['id'] . "', '$degree', '$about', '$exp', '$gender', '$district', '$state', '$country', '$skills', '$past_position', '$contact_mail')";


    if($con->query($sql) == true){

        header("location: job.php");

    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

     // Close the database connection
     $con->close();

?>