<?php
session_start();

include("connection.php");

if (!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

if (isset($_POST["submit"])) {
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

    $update_sql = "UPDATE jobportal.job_seeker SET 
                   degree = '$degree', 
                   about = '$about', 
                   exp = '$exp', 
                   gender = '$gender', 
                   district = '$district', 
                   state = '$state', 
                   country = '$country', 
                   skills = '$skills', 
                   past_position = '$past_position', 
                   contact_mail = '$contact_mail' 
                   WHERE sid = '" . $_SESSION['id'] . "'";

    if($con->query($update_sql) == true){

        header("location: updatejsform.php");
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