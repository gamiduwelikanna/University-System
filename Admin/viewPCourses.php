<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prerequired Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b6dbe2;
            margin: 10px;
            padding: 0;
            overflow: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 90vh;
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

        .form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center; /* Center text within .form */
            background-color: #fffdeb;
            color: #3e3e3c;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 60%; /* Adjust the width to match the example */
            margin-top: -200px;
        }

        .form label {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .form input {
            padding: 10px;
            font-size: 18px;
            border: 1px solid #36454f;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 100%; /* Make the input fields full width */
        }

        .form button {
            padding: 10px;
            background-color: #36454f;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 18px; /* Set the font size the same as the input fields */
            cursor: pointer;
            width: 110%; /* Make the button full width */
        }

        .form button:hover {
            background-color: #000;
        }

        .home {
            margin-top: 20px;
            position: absolute;
            left: 10px;
            top: -20px;
        }

        .home a {
            text-decoration: none;
            padding: 15px 30px;
            background-color: #36454f;
            color: #fff;
            border-radius: 10px;
            font-weight: bold;
            font-size: 24px;
        }

        .home a:hover {
            background-color: #000;
        }

        .login-title {
            font-size: 40px;
            position: relative;
            left: 20px;
            top: 80px;
        }
    </style>
</head>
<body>
    <div class="home">
        <h4><a href="http://localhost/University/System/Users/Admin/admin.php"> Home </a></h4>
    </div>
    <center>
        <h2 class="login-title">Fill This Form To View Prerequired Courses</h2>
    </center>
    <div class="container">
        <div class="form">
            <form action="Includes/connectionViewPCourse.php" method="post">
                <input type="text" name="CourseID" placeholder="Course ID"><br>
                <button type="submit">View Prerequired Course</button>
            </form>
        </div>
    </div>
</body>
</html>
