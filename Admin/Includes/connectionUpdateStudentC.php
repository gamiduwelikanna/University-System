<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

$studentID = $_POST['StudentID'];
$newContactNo = $_POST['ContactNo']; // Assuming you get the new contact number from a form

$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the student with the provided ID exists in the 'stud_contact' table
$checkContactQuery = "SELECT * FROM stud_contact WHERE studentID='$studentID'";
$checkContactResult = $connection->query($checkContactQuery);

// Check if the student with the provided ID exists in the 'student' table
$checkStudentQuery = "SELECT * FROM student WHERE studentID='$studentID'";
$checkStudentResult = $connection->query($checkStudentQuery);

echo '<html>';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<title>Student Contact Information</title>';
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
echo '    font-size: 40px;'; /* Changed font size */
echo '}';
echo '.content p {';
echo '    font-size: 18px;';
echo '    margin: 10px;';
echo '}';
echo '.error-message {';
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

if ($checkStudentResult->num_rows > 0) {
    // Student exists in 'student' table
    if ($checkContactResult->num_rows > 0) {
        // Student also exists in 'stud_contact' table, update data
        $updateQuery = "UPDATE stud_contact SET contactNo='$newContactNo' WHERE studentID='$studentID'";
        $updateResult = $connection->query($updateQuery);
        
        if ($updateResult) {
            echo '<h3>Update Successful</h3>';
            echo '<p>Record updated successfully.</p>';
        } else {
            echo '<h3 class="error-message">Update Error</h3>';
            echo '<p class="error-message">' . $connection->error . '</p>';
        }
    } else {
        echo '<h3 class="error-message">Update Error</h3>';
        echo '<p class="error-message">Student ID ' . $studentID . ' exists in \'student\' table but not in \'stud_contact\' table.</p>';
    }
} else {
    echo '<h3 class="error-message">Student Not Found</h3>';
    echo '<p>No student found with the provided Student ID.</p>';
}

echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';

$connection->close();
?>
