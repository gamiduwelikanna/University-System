<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

$courseID = $_POST['CourseID'];
$coReqCourseID1 = $_POST['CoReqCourseID1'];
$coReqCourseID2 = $_POST['CoReqCourseID2'];

$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$checkCourseQuery = "SELECT * FROM course WHERE courseID='$courseID'";
$checkCoReqQuery1 = "SELECT * FROM course WHERE courseID='$coReqCourseID1'";
$checkCoReqQuery2 = "SELECT * FROM course WHERE courseID='$coReqCourseID2'";

$courseResult = $connection->query($checkCourseQuery);
$coReqResult1 = $connection->query($checkCoReqQuery1);
$coReqResult2 = $connection->query($checkCoReqQuery2);

if ($courseResult->num_rows > 0 && $coReqResult1->num_rows > 0 && $coReqResult2->num_rows > 0) {
    $updateQuery = "UPDATE coreqcourse SET coReqCourseID='$coReqCourseID2' WHERE courseID='$courseID' AND coReqCourseID='$coReqCourseID1'";

    if ($connection->query($updateQuery) === TRUE) {
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Corequisite Course Information Updated</title>';
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
        echo '<h3>Corequisite Course Information Updated</h3>';
        echo '<p>Corequisite course information updated successfully!</p>';
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    } else {
        echo "Error updating Corequisite Course information: " . $connection->error;
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

    if ($coReqResult1->num_rows <= 0) {
        echo '<p>Corequisite Course with ID ' . $coReqCourseID1 . ' not found.</p>';
    }

    if ($coReqResult2->num_rows <= 0) {
        echo '<p>Corequisite Course with ID ' . $coReqCourseID2 . ' not found.</p>';
    }

    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}

$connection->close();
?>
