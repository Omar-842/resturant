<?php
include('connection.php');
session_start();
if(isset($_SESSION['username'])){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card_number = $_POST['card_number'];
    $cardholder_name = $_POST['cardholder_name'];
    $expiry_date = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    if (!empty($card_number) && !empty($cardholder_name) && !empty($expiry_date) && !empty($cvv)) {
        $sql = "SELECT * FROM users WHERE visanumber='$card_number' AND cvv='$cvv' AND cardholdername='$cardholder_name' AND expdate='$expiry_date'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
                    alert('THANK YOU FOR PURCHASING FROM OUR STORE');
                    window.location.href = 'thank_you_page.php';
                  </script>";
        } else {
            echo "<script>
                    alert('PURCHASING PROCESS DECLINED!');
                    window.location.href = 'logout.php';
                  </script>";
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Information</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card-container {
            background-color: #fff;
            width: 400px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        label {
            font-size: 14px;
            color: #555;
        }
        #input {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #f9f9f9;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <h2>Confirm Your Card Information</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
            <label>Card Number:</label>
            <input id="input" type="text" name="card_number" required><br><br>
            <label>Cardholder Name:</label>
            <input id="input" type="text" name="cardholder_name" required><br><br>
            <label>Expiry Date:</label>
            <input id="input" type="text" name="expiry_date" required><br><br>
            <label>CVV:</label>
            <input id="input" type="text" name="cvv" required><br><br>
            <button type="submit">Confirm</button>
        </form>
    </div>
</body>
</html>
