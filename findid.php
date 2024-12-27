<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pname'])) {
    $productName = $_POST['pname'];

    if (!empty($productName)) {
        $query = "SELECT id FROM products WHERE name='$productName'";
        $result = mysqli_query($con, $query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Fetch the row once as there's only one product name
                $row = mysqli_fetch_array($result);
                
                // Display the alert and then redirect
                echo "<script> alert('The id is " . $row['id'] . "'); window.location.href='adminmanage.php'; </script>";
                exit();
            } else {
                echo '<script type="text/javascript"> alert("No result Found"); window.location.href="adminmanage.php"; </script>';
                exit();
            }
        } else {
            echo '<script type="text/javascript"> alert("Error fetching"); window.location.href="adminmanage.php"; </script>';
            exit();
        }
    } else {
        echo '<script type="text/javascript"> alert("Please fill the product name"); window.location.href="adminmanage.php"; </script>';
        exit();
    }
} else {
    echo '<script type="text/javascript"> alert("Fill the product name"); window.location.href="adminmanage.php"; </script>';
    exit();
}
?>
