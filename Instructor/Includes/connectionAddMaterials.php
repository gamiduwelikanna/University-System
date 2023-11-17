<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseID = $_POST['CourseID'];
    $materialID = $_POST['Material'];
    $facultyID = $_POST['facultyID'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    $format = $_POST['format'];

    $connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Check if the courseID is valid
    $courseCheckQuery = "SELECT * FROM course WHERE courseID = '$courseID'";
    $courseCheckResult = $connection->query($courseCheckQuery);

    if ($courseCheckResult->num_rows == 0) {
        displayError("Invalid Course ID. Please check the course ID and try again.");
    } else {
        // Check if the facultyID is valid
        $facultyCheckQuery = "SELECT * FROM instructor WHERE facultyID = '$facultyID'";
        $facultyCheckResult = $connection->query($facultyCheckQuery);

        if ($facultyCheckResult->num_rows == 0) {
            displayError("Invalid Faculty ID. Please check the faculty ID and try again.");
        } else {
            // Check if the record already exists
            $checkExistingQuery = "SELECT * FROM coursematerial WHERE courseID = '$courseID' AND facultyID = '$facultyID'";
            $existingResult = $connection->query($checkExistingQuery);

            if ($existingResult->num_rows > 0) {
                displayError("Record already exists. You cannot add the same course material for the same course and faculty.");
            } else {
                // Both courseID and facultyID are valid, and the record doesn't exist, so insert the course material
                $query = "INSERT INTO coursematerial (courseID, materialID, facultyID, title, link, format) VALUES ('$courseID', '$materialID', '$facultyID', '$title', '$link', '$format')";

                if ($connection->query($query) === TRUE) {
                    echo '<html>';
                    echo '<head>';
                    echo '<meta charset="UTF-8">';
                    echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
                    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
                    echo '<title>Course Material Added</title>';
                    echo '<style>';
                echo 'body {';
                echo '    font-family: Arial, sans-serif;';
                echo '    background-color: #b6dbe2;';
                echo '    margin: 0;';
                echo '    padding: 0;';
                echo '}';
                echo '.container {';
                echo '    display: flex;';
                echo '    flex-direction: column;';
                echo '    align-items: center;';
                echo '    justify-content: center;';
                echo '    height: 100vh;';
                echo '}';
                echo '.content {';
                echo '    text-align: center;';
                echo '    background-color: #fffdeb;';
                echo '    color: #3e3e3c;';
                echo '    padding: 40px;';
                echo '    border-radius: 10px;';
                echo '    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);';
                echo '    margin: 40px;';
                echo '}';
                echo '.content h3 {';
                echo '    font-size: 47px;';
                echo '}';
                echo '.content p {';
                echo '    font-size: 18px;';
                echo '    margin: 10px;';
                echo '}';
                echo '.home-link {';
                echo '    position: absolute;';
                echo '    top: -15px;';
                echo '    left: -10px;';
                echo '    padding: 15px 30px;';
                echo '    background-color: #36454f;';
                echo '    color: #fff;';
                echo '    border-radius: 10px;';
                echo '    font-weight: bold;';
                echo '    font-size: 24px;';
                echo '    text-decoration: none;';
                echo '    margin: 20px;';
                echo '}';
                echo '.home-link:hover {';
                echo '    background-color: #000;';
                echo '}';
                echo '</style>';
                    echo '</head>';
                    echo '<body>';
                    echo '<a class="home-link" href="http://localhost/University/System/Users/Instructor/instructor.php">Home</a>';
                    echo '<div class="container">';
                    echo '<div class="content">';
                    echo '<h3>Course Material Added</h3>';
                    echo '<p>Course material added successfully!</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</body>';
                    echo '</html>';
                } else {
                    displayError("Error: " . $query . "<br>" . $connection->error);
                }
            }
        }
    }

    $connection->close();
}

function displayError($errorMessage) {
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
    echo '<meta name="viewport" content="width-device-width, initial-scale=1.0">';
    echo '<title>Error</title>';
    echo '<style>';
                echo 'body {';
                echo '    font-family: Arial, sans-serif;';
                echo '    background-color: #b6dbe2;';
                echo '    margin: 0;';
                echo '    padding: 0;';
                echo '}';
                echo '.container {';
                echo '    display: flex;';
                echo '    flex-direction: column;';
                echo '    align-items: center;';
                echo '    justify-content: center;';
                echo '    height: 100vh;';
                echo '}';
                echo '.content {';
                echo '    text-align: center;';
                echo '    background-color: #fffdeb;';
                echo '    color: #3e3e3c;';
                echo '    padding: 40px;';
                echo '    border-radius: 10px;';
                echo '    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);';
                echo '    margin: 40px;';
                echo '}';
                echo '.content h3 {';
                echo '    font-size: 47px;';
                echo '}';
                echo '.content p {';
                echo '    font-size: 18px;';
                echo '    margin: 10px;';
                echo '}';
                echo '.home-link {';
                echo '    position: absolute;';
                echo '    top: -15px;';
                echo '    left: -10px;';
                echo '    padding: 15px 30px;';
                echo '    background-color: #36454f;';
                echo '    color: #fff;';
                echo '    border-radius: 10px;';
                echo '    font-weight: bold;';
                echo '    font-size: 24px;';
                echo '    text-decoration: none;';
                echo '    margin: 20px;';
                echo '}';
                echo '.home-link:hover {';
                echo '    background-color: #000;';
                echo '}';
                echo '</style>';
    echo '</head>';
    echo '<body>';
    echo '<a class="home-link" href="http://localhost/University/System/Users/Instructor/instructor.php">Home</a>';
    echo '<div class="container">';
    echo '<div class="content">';
    echo '<h3>Error</h3>';
    echo '<p>' . $errorMessage . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}
?>
