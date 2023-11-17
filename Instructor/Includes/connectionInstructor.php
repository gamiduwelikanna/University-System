<?php
session_start();

// Database configuration
$dbServerName = "localhost";
$dbUserName = "root";  // Replace with your database username
$dbPassword = '';      // Replace with your database password
$dbName = "uni";  // Replace with your database name

// User input
$inputUsername = $_POST['User_Name']; // No need to escape here
$inputPassword = $_POST['Password'];   // No need to escape here

// Hash the user's password
$hashedPassword = password_hash($inputPassword, PASSWORD_DEFAULT);

// Establish a database connection
$conn = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define an array of valid instructor usernames
$validUsernames = array("in1", "in2", "in3", "in4", "in5","in6","in7","in8","in9","in10");

if (in_array($inputUsername, $validUsernames)) {
    // User is valid
    // Now, let's query the 'login' table in the database to validate the user
    $stmt = $conn->prepare("SELECT facultyID, password_ FROM instructor WHERE facultyID = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists in the 'login' table
        $stmt->bind_result($username, $inputPassword);
        $stmt->fetch();
        if (password_verify($inputPassword, $hashedPassword)) {
            // Password matches, login successful
            // Redirect to instructor.php
            header("Location: ../instructor.php");
            exit; // Important: Terminate the script after the redirect
        } else {
            echo '<html>';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
            echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            echo '<title>Instructor Profile</title>';
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
            echo '<h3>Instructor Profile</h3>';
            echo '<p>Login failed. Invalid username or password.</p>';
            echo '</div>';
            echo '</div>';
            echo '</body>';
            echo '</html>';
        }
    } else {
        echo '<html>';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>Instructor Profile</title>';
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
        echo '<h3>Instructor Profile</h3>';
        echo '<p>No Instructor found with the provided Instructor ID.</p>';
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo '<html>';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta http-equiv="X-UA-Compatible" content="IE-edge">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>Instructor Profile</title>';
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
    echo '<h3>Instructor Profile</h3>';
    echo '<p>Login failed. Invalid username or password.</p>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}
?>
<center><a href="../../../index.php">OK</a></center>
