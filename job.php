<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
</head>
<body>

    <a href="index.php">Home</a>
    <form method="post">
        <label>Search by job title:</label>
        <input type="text" name="search"><br><br>
        <input type="submit" name="submit" value="SEARCH">
    </form>

    <table>
        <tr>
            <th>JID</th>
            <th>EID</th>
            <th>JOB TITLE</th>
            <th>MIN QUALIFICATIONS</th>
            <th>TECH STACK</th>
            <th>JOB DESCRIPTION</th>
            <th>POSTING DATE</th>
            <th>APPLY</th>
        </tr>

        <?php
        $conn = mysqli_connect("localhost", "root", "", "jobportal") or die("Connection failed");

        if (isset($_POST["submit"])) {
            $search = isset($_POST["search"]) ? $_POST["search"] : '';

            $sql = "SELECT * FROM job WHERE jobtitle LIKE '%" . $search . "%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["jid"] . "</td>";
                    echo "<td>" . $row["eid"] . "</td>";
                    echo "<td>" . $row["jobtitle"] . "</td>";
                    echo "<td>" . $row["min_qual"] . "</td>";
                    echo "<td>" . $row["techstack"] . "</td>";
                    echo "<td>" . $row["jobdesc"] . "</td>";
                    echo "<td>" . $row["dateposted"] . "</td>";
                    
                    // Display the checkbox with the checked status
                    echo "<td><input type='checkbox' id='checkbox_" . $row["jid"] . "' name='apply' onchange='updateApplyStatus(" . $row["jid"] . ", this)'></td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "Sorry, no jobs available.";
            }
        }

        mysqli_close($conn);
        ?>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        // Checkbox state persistence code
        var checkboxValues = JSON.parse(localStorage.getItem('checkboxValues')) || {},
            $checkboxes = $("input[type='checkbox']");

        $checkboxes.on("change", function(){
            $checkboxes.each(function(){
                checkboxValues[this.id] = this.checked;
            });

            localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
        });

        // On page load
        $.each(checkboxValues, function(key, value) {
            $("#" + key).prop('checked', value);
        });

        // Update Apply Status function
        function updateApplyStatus(jobId, checkbox) {
            var isChecked = checkbox.checked;

            // Your AJAX request to update the database
            $.ajax({
                type: 'POST',
                url: 'update_apply_status.php',
                data: { jobId: jobId, isChecked: isChecked },
                success: function(response) {
                    console.log(response);

                    // Update the local storage when the database is successfully updated
                    checkboxValues["checkbox_" + jobId] = isChecked;
                    localStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
</body>
</html>