<?php
session_start();
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: adminmanage.php");
        exit();
    } else {
    echo"<script>alert('Invalid username or password!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 50px;
            display: flex;
            justify-content: center;
        }
        .login {
            background-color: white;
            padding: 20px;
            border: 1px solid #ccc;
            width: 300px;
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        #input, #input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        #submit {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        #submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login">
        <h1>Admin Login</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <label for="username">Username:</label>
            <input id="input" type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input id="input" type="password" id="password" name="password" required>
            <input type="submit" id="submit" value="Login">
        </form>
    </div>
</body>
</html>
