<?php
session_start();

include("connection.php");

if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}

// $degree = $_POST['degree'];
// $about = $_POST['about'];
// $exp = $_POST['exp'];
// $gender = $_POST['gender'];
// $district = $_POST['district'];
// $state = $_POST['state'];
// $country = $_POST['country'];
// $skills = $_POST['skills'];
// $past_position = $_POST['past_position'];
// $contact_mail = $_POST['contact_mail'];

$sql = "SELECT * FROM jobportal.job_seeker WHERE sid = '" . $_SESSION['id'] . "'";


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
            <title>Job-Seeker-Details</title>
        </head>

        <body>
            <header>
                <h1>NSUT TNP Job Portal</h1>
            </header>
            <div class="return-to-home">
                <a href="logout.php">Logout</a>
            </div>
            <div class="page-content">
                <h1 class="page-heading">Student Details</h1>
                <div class="form-container">
                    <form action="updatejs.php" method="post">
                        <label for="degree">Degree: </label>
                        <input type="text" id="degree" name="degree"
                            value="<?php echo isset($row['degree']) ? $row['degree'] : ''; ?>">
                        <br><br>

                        <label for="about">About: </label>
                        <input type="text" id="about" name="about"
                            value="<?php echo isset($row['about']) ? $row['about'] : ''; ?>">
                        <br><br>

                        <label for="exp">Experience (in years): </label>
                        <input type="number" id="exp" name="exp" value="<?php echo isset($row['exp']) ? $row['exp'] : ''; ?>">
                        <br><br>

                        <label for="gender">Gender: </label>
                        <input type="text" id="gender" name="gender"
                            value="<?php echo isset($row['gender']) ? $row['gender'] : ''; ?>">
                        <br><br>

                        <label for="district">District: </label>
                        <input type="text" id="district" name="district"
                            value="<?php echo isset($row['district']) ? $row['district'] : ''; ?>">
                        <br><br>

                        <label for="state">State: </label>
                        <input type="text" id="state" name="state"
                            value="<?php echo isset($row['state']) ? $row['state'] : ''; ?>">
                        <br><br>

                        <label for="country">Country: </label>
                        <input type="text" id="country" name="country"
                            value="<?php echo isset($row['country']) ? $row['country'] : ''; ?>">
                        <br><br>

                        <label for="skills">Skills: </label>
                        <input type="text" id="skills" name="skills"
                            value="<?php echo isset($row['skills']) ? $row['skills'] : ''; ?>">
                        <br><br>

                        <label for="past_position">Past Position: </label>
                        <input type="text" id="past_position" name="past_position"
                            value="<?php echo isset($row['past_position']) ? $row['past_position'] : ''; ?>">
                        <br><br>

                        <label for="contact_mail">Contact Mail: </label>
                        <input type="text" id="contact_mail" name="contact_mail"
                            value="<?php echo isset($row['contact_mail']) ? $row['contact_mail'] : ''; ?>">
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