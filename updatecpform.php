<?php
session_start();

include("connection.php");

if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

$sql = "SELECT * FROM jobportal.employer WHERE eid = '" . $_SESSION['id'] . "'";


$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="main.css" />
            <title>Update-Company-Details</title>
        </head>

        <body>
            <header>
                <h1>NSUT TNP Job Portal</h1>
            </header>
            <div class="return-to-home">
                <a href="logout.php">Logout</a>
                <a href="jobposted.php">Home</a>
            </div>

            <div class="page-content">
                <h1 class="page-heading">Company Details</h1>
                <div class="form-container">
                    <form action="updatecp.php" method="post">
                        <label for="cname">Company Name: </label>
                        <input type="text" id="cname" name="cname"
                            value="<?php echo isset($row['cname']) ? $row['cname'] : ''; ?>">
                        <br><br>

                        <label for="about">About: </label>
                        <input type="text" id="about" name="about"
                            value="<?php echo isset($row['about']) ? $row['about'] : ''; ?>">
                        <br><br>

                        <label for="contact_no">Contact no: </label>
                        <input type="number" id="contact_no" name="contact_no"
                            value="<?php echo isset($row['contact_no']) ? $row['contact_no'] : ''; ?>">
                        <br><br>

                        <label for="cwebsite">Website: </label>
                        <input type="text" id="cwebsite" name="cwebsite"
                            value="<?php echo isset($row['cwebsite']) ? $row['cwebsite'] : ''; ?>">
                        <br><br>

                        <label for="cmail">Email address: </label>
                        <input type="text" id="cmail" name="cmail"
                            value="<?php echo isset($row['cmail']) ? $row['cmail'] : ''; ?>">
                        <br><br>

                        <div class="form-submission">
                            <div class="form-submission--element"><button type="submit" name="submit">Update</button></div>
                        </div>

                    </form>
                </div>
            </div>

        </body>

        </html>
        <?php
    }
}
$con->close();
?>