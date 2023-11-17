<?php
session_start();

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = '';
$dbName = "uni";

$studentID = $_POST['StudentID'];
$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Check if the student with the provided ID exists
$checkExistingQuery = "SELECT * FROM student WHERE studentID='$studentID'";
$checkExistingResult = $connection->query($checkExistingQuery);

if ($checkExistingResult->num_rows > 0) {
    // Student exists, perform the deletion
    $deleteQuery = "DELETE FROM student WHERE studentID='$studentID'";
    $deleteResult = $connection->query($deleteQuery);

    if ($deleteResult) {
        $message = "Record Deleted";
    } else {
        $message = "Error Deleting Record: " . $connection->error;
    }
} else {
    $message = "Error: Student does not exist";
}

$connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b6dbe2;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .content {
            text-align: center;
            background-color: #fffdeb;
            color: #3e3e3c;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 40px;
        }
        .content h3 {
            font-size: 47px;
        }
        .content p {
            font-size: 18px;
            margin: 10px;
        }
        .success-message, .error-message {
            color: #3e3e3c;
        }
        .home-link {
            position: absolute;
            top: -15px;
            left: -10px;
            padding: 15px 30px;
            background-color: #36454f;
            color: #fff;
            border-radius: 10px;
            font-weight: bold;
            font-size: 24px;
            text-decoration: none;
            margin: 20px;
        }
        .home-link:hover {
            background-color: #000;
        }
    </style>
</head>
<body>
    <a class="home-link" href="http://localhost/University/System/Users/Admin/admin.php">Home</a>
    <div class="container">
        <div class="content">
            <h3><?php echo $message; ?></h3>
            <p class="success-message">
                <?php
                if ($checkExistingResult->num_rows > 0 && $deleteResult) {
                    echo "Student record with ID $studentID has been deleted successfully.";
                } elseif ($checkExistingResult->num_rows == 0) {
                    echo 'No student found with the provided Student ID.';
                }
                ?>
            </p>
        </div>
    </div>
</body>
</html>
