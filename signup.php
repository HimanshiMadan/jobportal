<?php
session_start();
$insert = false;
if(isset($_POST['email'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database coannection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
    $usertype = $_POST['usertype'];
    $sql = "INSERT INTO jobportal.person (`email`, `password`, `fname`, `lname`, `phone`, `dob`, `usertype`) VALUES ('$email', '$password', '$fname', '$lname', '$phone','$dob','$usertype');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $query = "select * from jobportal.person where email = '$email' limit 1";
		$result = mysqli_query($con, $query);
        $user_data = mysqli_fetch_assoc($result);
        $_SESSION['id'] = $user_data['pid'];
        if($user_data['usertype'] == 's'){
            header("Location: qualifications.html");
        }
        else if($user_data['usertype'] == 'e'){
            header("location: company.html");
        }
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>