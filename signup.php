<?php
session_start();
include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $password = md5($_POST['password']);
    $visanum = $_POST['visanumber'];
    $cvv = $_POST['cvv'];
    $chname = $_POST['cardholdername'];
    $expdate = $_POST['expirydate'];

    if (!empty($name) && !empty($password) && !empty($visanum) && !empty($cvv) && !empty($chname) && !empty($expdate)) {
        if (is_numeric($visanum) && is_numeric($cvv)) {
            $q = "SELECT * FROM users WHERE username='$name' AND visanumber='$visanum' AND cardholdername='$chname'";
            $r = mysqli_query($con, $q);
            if (mysqli_num_rows($r) > 0) {
                echo '<script type="text/javascript"> alert("There is already an existing user in these information")</script>';
            }else{

            $query = "INSERT INTO users (username, password, visanumber, cvv, cardholdername, expdate)  VALUES ('$name', '$password', '$visanum', '$cvv', '$chname', '$expdate')";
            $result = mysqli_query($con, $query);

            if ($result) {
                setcookie("uname", $_POST["name"], time()+36000);
                echo "<script>alert('Signed up successfully!');</script>";
                header("Location: login.php");
                exit();
            } else {
                echo "<script>alert('Error signing up, please try again later.');</script>";
            }
        }
        } else {
            echo "<script>alert('Visa number and CVV must be numeric.');</script>";
        }
    } else {
        echo "<script>alert('All fields are required.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            margin: 0;
        }
        .main-container {
            width: 80%;
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        #input{
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #5CB85C;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #4cae4c;
        }
        p {
            text-align: center;
        }
        a {
            color: #5CB85C;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h2>Create an Account</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <input id="input" type="text" name="username" placeholder="Enter Username" required>
            <input id="input" type="password" name="password" placeholder="Enter Password" required>
            <input id="input" type="text" name="visanumber" placeholder="Card Number" required>
            <input id="input" type="text" name="cvv" placeholder="CVV" required>
            <input id="input" type="text" name="cardholdername" placeholder="Cardholder Name" required>
            <input id="input" type="text" name="expirydate" placeholder="MM/YY Expiry" required>
            <button type="submit">Submit</button>
        </form>
        <p>Already have an account? <a href="login.php">Log in here</a></p>
    </div>
</body>
</html>

