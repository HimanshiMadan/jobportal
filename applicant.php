<?php

session_start();

    if(!isset($_SESSION['id'])){

        header("location: login.html");
        exit();    
    }
// Assuming you have a database connection established
    include("connection.php");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Assuming the employer's ID is known, replace 'your_eid' with the actual employer ID
    $employer_id = $_SESSION['id'];

    // SQL query to get the applicants for a specific job posted by a particular employer
    $sql = "SELECT person.*, job_seeker.*, applied.jid, applied.date, job.*
            FROM person 
            JOIN job_seeker ON person.pid = job_seeker.sid 
            JOIN applied ON job_seeker.sid = applied.sid 
            JOIN job ON applied.jid = job.jid 
            WHERE job.eid = $employer_id";

    $result = $con->query($sql);

    echo "<h2>Applicants: </h2>";

    echo "<a href='logout.php'>Logout</a><br><br>";

    echo "<a href='jobposted.php'>Home</a><br><br>";

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Job ID</th>
                    <th>Job Title</th>
                    <th>Applicant ID</th>
                    <th>Email</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Date of Birth</th>
                    <th>Skills</th>
                    <th>Experience</th>
                    <th>Gender</th>
                    <th>District</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>About</th>
                    <th>Past Position</th>
                    <th>Date Applied</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["jid"] . "</td>
                    <td>" . $row["jobtitle"] . "</td>
                    <td>" . $row["pid"] . "</td>
                    <td>" . $row["contact_mail"] . "</td>
                    <td>" . $row["fname"] . "</td>
                    <td>" . $row["lname"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["dob"] . "</td>
                    <td>" . $row["skills"] . "</td>
                    <td>" . $row["exp"] . "</td>
                    <td>" . $row["gender"] . "</td>
                    <td>" . $row["district"] . "</td>
                    <td>" . $row["state"] . "</td>
                    <td>" . $row["country"] . "</td>
                    <td>" . $row["about"] . "</td>
                    <td>" . $row["past_position"] . "</td>
                    <td>" . $row["date"] . "</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No applicants found";
    }

    $con->close();
?>
