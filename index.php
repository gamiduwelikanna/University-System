<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Management System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b6dbe2; /* Background color */
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
            background-color: #fffdeb; /* Content background color */
            color: #3e3e3c; /* Text color */
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin: 40px;
        }

        .content h3 {
            font-size: 47px;
        }

        .levels {
            display: flex;
            justify-content: center;
        }

        .link1, .link2, .link3 {
            margin: 20px;
        }

        .link1 a, .link2 a, .link3 a {
            text-decoration: none;
            padding: 20px 40px;
            background-color: #36454f; /* Button background color */
            color: #fff; /* Button text color */
            border-radius: 10px;
            font-weight: bold;
            font-size: 40px;
        }

        .link1 a:hover, .link2 a:hover, .link3 a:hover {
            background-color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>University Management System</h3>
        </div>
        <div class="levels">
            <div class="link1"><a href="Users/Student/studentlogin.php">Student</a></div>
        </div>

        <br>
        <br>

        <div>
            <div class="link2"><a href="Users/Instructor/instructorlogin.php">Instructor</a></div>
        </div>

        <br>
        <br>

        <div>
            <div class="link3"><a href="Users/Admin/adminlogin.php">Admin</a></div>
        </div>
    </div>
</body>
</html>
