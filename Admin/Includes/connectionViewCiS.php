<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

$studentID = $_POST['StudentID'];
$courseID = $_POST['CourseID'];

$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT * FROM enroll_semester WHERE studentID='$studentID' AND courseID='$courseID'";

$result = $connection->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Enrollment Information</title>';
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
        echo '<a class="home-link" href="http://localhost/University/System/Users/Admin/admin.php">Home</a>';
        echo '<div class="container">';
        echo '<div class="content">';
        echo '<h3>Enrollment Information</h3>';
        
        while ($row = $result->fetch_assoc()) {
            $studentID = $row["studentID"];
            $courseID = $row["courseID"];
            $semester = $row["semester"];

            echo '<p>Student ID: ' . $studentID . '</p>';
            echo '<p>Course ID: ' . $courseID . '</p>';
            echo '<p>Semester: ' . $semester . '</p>';

            echo '<br>';
        }

        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    } else {
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Enrollment Information</title>';
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
        echo '<a class="home-link" href="http://localhost/University/System/Users/Admin/admin.php">Home</a>';
        echo '<div class="container">';
        echo '<div class="content">';
        echo '<h3>Error</h3>';
        echo '<p>No enrollment records found for the provided Student ID and Course ID.</p>';
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }
} else {
    echo "Error: " . $connection->error;
}

$connection->close();
?>
