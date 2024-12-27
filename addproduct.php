<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_tmp_name = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        $allowed_types = ['image/jpeg', 'image/png'];
        if (in_array($file_type, $allowed_types)) {
            $target_file = "uploads/" . basename($file_name);
            if (move_uploaded_file($file_tmp_name, $target_file)) {
                $productName = $_POST['productName'];
                $productDescription = $_POST['productDescription'];
                $productPrice = $_POST['productPrice'];
                $q="SELECT * from products where name='$productName'";
                $r=mysqli_query($con, $q);
                if (mysqli_num_rows($r) > 0) {
                    echo'<script type="text/javascript"> alert("Product already exists!!"); window.location.href="adminmanage.php"; </script>';
                } else {

                
                $query = "INSERT INTO products (name, description, price, image) VALUES ('$productName', '$productDescription', '$productPrice', '$target_file')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo '<script type="text/javascript"> alert("Product added successfully!"); window.location.href="adminmanage.php"; </script>';
                    exit(); 
                } else {
                    echo '<script type="text/javascript"> alert("Error adding product: ' . mysqli_error($con) . '"); window.location.href="adminmanage.php"; </script>';
                    exit();
                }
            }
            } else {
                echo '<script type="text/javascript"> alert("Sorry, there was an error uploading your file."); window.location.href="adminmanage.php"; </script>';
                exit();
            }
        } else {
            echo '<script type="text/javascript"> alert("Only JPG and PNG files are allowed."); window.location.href="adminmanage.php"; </script>';
            exit();
        }
    } else {
        echo '<script type="text/javascript"> alert("No file uploaded or there was an error with the file."); window.location.href="adminmanage.php"; </script>';
        exit();
    }
}

?>
