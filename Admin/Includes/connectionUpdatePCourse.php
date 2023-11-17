<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

$courseID = $_POST['CourseID'];
$preReqCourseID1 = $_POST['PreReqCourseID1'];
$preReqCourseID2 = $_POST['PreReqCourseID2'];

$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$checkCourseQuery = "SELECT * FROM course WHERE courseID='$courseID'";
$checkPreReqQuery1 = "SELECT * FROM course WHERE courseID='$preReqCourseID1'";
$checkPreReqQuery2 = "SELECT * FROM course WHERE courseID='$preReqCourseID2'";

$courseResult = $connection->query($checkCourseQuery);
$preReqResult1 = $connection->query($checkPreReqQuery1);
$preReqResult2 = $connection->query($checkPreReqQuery2);

if ($courseResult->num_rows > 0 && $preReqResult1->num_rows > 0 && $preReqResult2->num_rows > 0) {
    $updateQuery = "UPDATE prereqcourse SET preReqCourseID='$preReqCourseID2' WHERE courseID='$courseID' AND preReqCourseID='$preReqCourseID1'";

    if ($connection->query($updateQuery) === TRUE) {
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Prerequisite Course Information Updated</title>';
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
        echo '<h3>Prerequisite Course Information Updated</h3>';
        echo '<p>Prerequisite course information updated successfully!</p>';
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    } else {
        echo "Error updating Prerequisite Course information: " . $connection->error;
    }
} else {
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
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
    echo '<a class="home-link" href="http://localhost/University/System/Users/Admin/admin.php">Home</a>';
    echo '<div class="container">';
    echo '<div class="content">';
    echo '<h3>Error</h3>';
    
    if ($courseResult->num_rows <= 0) {
        echo '<p>Course with ID ' . $courseID . ' not found.</p>';
    }

    if ($preReqResult1->num_rows <= 0) {
        echo '<p>Prerequisite Course with ID ' . $preReqCourseID1 . ' not found.</p>';
    }

    if ($preReqResult2->num_rows <= 0) {
        echo '<p>Prerequisite Course with ID ' . $preReqCourseID2 . ' not found.</p>';
    }

    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}

$connection->close();
?>
