<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

        .levels {
            display: flex;
            justify-content: center;
        }

        .link1, .link2, .link3, .link4, .link5 {
            margin: 20px;
        }

        .link1 a, .link2 a, .link3 a, .link4 a, .link5 a {
            text-decoration: none;
            padding: 20px 40px;
            background-color: #36454f;
            color: #fff;
            border-radius: 10px;
            font-weight: bold;
            font-size: 30px;
        }

        .link1 a:hover, .link2 a:hover, .link3 a:hover, .link4 a:hover, .link a:hover {
            background-color: #000;
        }

        .home {
        margin-top: 20px;
        position: absolute;
        left: 10px;
        top: 1px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <center><h1>Choose The Operation</h1></center>
        </div>
        <div class="levels">
            <!-- Add your operation links here -->
            <div class="link1"><a href="student.php">Student Related Tasks</a></div>
        </div>

        <br>
        <br>

        <div class="levels">
            <!-- Add your operation links here -->
            <div class="link2"><a href="insTasks.php">Instructor Related Tasks</a></div>
        </div>

        <br>
        <br>

        <div class="levels">
            <!-- Add your operation links here -->
            <div class="link3"><a href="grades.php">Grade Related Tasks</a></div>
        </div>

        <br>
        <br>

        <div class="levels">
            <!-- Add your operation links here -->
            <div class="link4"><a href="courses.php">Course Related Tasks</a></div>
        </div>

        <br>
        <br>

        <div class="levels">
            <!-- Add your operation links here -->
            <div class="link5"><a href="includes/connectionViewAdmin.php">Admin Information</a></div>
        </div>

        <div class="home">
            <a href="http://localhost/University/System/Users/Admin/admin.php">Home</a>
        </div>
    </div>
</body>
</html>
