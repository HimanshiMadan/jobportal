<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the necessary parameters are set
    if (isset($_POST['jobId']) && isset($_POST['sessionId'])) {
        $jobId = $_POST['jobId'];
        $sessionId = $_POST['sessionId'];

        // Validate and sanitize the input data
        $jobId = intval($jobId); // Convert to integer to prevent SQL injection
        $sessionId = intval($sessionId);

        // Your database connection code
        $conn = mysqli_connect("localhost", "root", "", "jobportal") or die("Connection failed");

        // Insert the job ID and session ID into the 'applied' table
        $updateSql = "INSERT INTO applied (jid, sid) VALUES ('$jobId', '$sessionId')";

        if (mysqli_query($conn, $updateSql)) {
            echo 'Applied status updated successfully.';
        } else {
            echo 'Error updating applied status: ' . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo 'Invalid parameters.';
    }
} else {
    echo 'Invalid request method.';
}
?>