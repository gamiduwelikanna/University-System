<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

$studentID = $_POST['StudentID'];
$password = $_POST['Password'];
$name = $_POST['Name'];
$email = $_POST['Email'];
$DOB = $_POST['DOB'];
$enrollmentStatus = $_POST['EnrollmentStatus'];
$advisorName = $_POST['AdvisorName'];
$bachelors = $_POST['Bachelors'];
$masters = $_POST['Masters'];
$phd = $_POST['PhD'];

$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$checkExistingQuery = "SELECT * FROM student WHERE studentID='$studentID'";
$checkExistingResult = $connection->query($checkExistingQuery);

echo '<html>';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>';

if ($checkExistingResult->num_rows > 0) {
    // Record exists, perform the update
    $updateQuery = "UPDATE student 
                    SET password_='$password', name='$name', email='$email', DOB='$DOB', enrollment_status='$enrollmentStatus', advisorName='$advisorName', 
                        `Bachelor's`='$bachelors', `Master's`='$masters', `Ph.D.`='$phd' 
                    WHERE studentID='$studentID'";

    $updateResult = $connection->query($updateQuery);

    if ($updateResult) {
        echo 'Record Updated';
    } else {
        echo 'Error Updating Record';
    }
} else {
    echo 'Error';
}

echo '</title>';
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
echo '.success-message, .error-message {';
echo '    color: #3e3e3c;';
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
echo '<h3>';

if ($checkExistingResult->num_rows > 0) {
    // Record exists, perform the update
    echo 'Record Updated';
} else {
    echo 'Error';
}

echo '</h3>';
echo '<p class="success-message">';

if ($checkExistingResult->num_rows > 0) {
    // Record exists, perform the update
    echo "Student record with ID $studentID has been updated successfully.";
} else {
    echo 'No student found with the provided Student ID.';
}

echo '</p>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';

$connection->close();
?>
