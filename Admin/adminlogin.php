<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #b6dbe2;
            margin: 10px;
            padding: 0;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 80vh;
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
            background-color: #fffdeb;
            color: #3e3e3c;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 60%;
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
            width: 100%;
        }

        .form button {
            padding: 15px 40px;
            background-color: #36454f;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 20px;
            cursor: pointer;
        }

        .form button:hover {
            background-color: #000;
        }
        

        .login-title {
            font-size: 40px;
            position: relative; /* Use relative or absolute positioning based on your layout needs */
            left: 20px; /* Adjust the left position as needed */
            top: 80px; /* Adjust the top position as needed */
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

    </style>
</head>
<body>
    
    <center>
        <h2 class="login-title">Please Enter Your Login Information</h2>
    </center>
    <div class="container"> <!-- Add a container for centering -->
        <div class="form">
            <form action="Includes/connectionAdmin.php" method="post">
                <input type="text" name="User_Name" placeholder="Admin ID" required>
                <input type="password" name="Password" placeholder="Password" required>
                <center>
                    <button type="submit" name="submit">Login</button>
                </center>
            </form>
        </div>
        <div class="home">
            <h4><a href="http://localhost/University/System/index.php"> Home </a></h4>
        </div>
    </div>
</body>
</html>
