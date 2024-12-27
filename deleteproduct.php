<?php

include('connection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    if(!empty($productId)) {
        $sql="SELECT * FROM products WHERE id='$productId'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0) {
        $query = "DELETE FROM products WHERE id = '$productId'";
        $result = mysqli_query($con, $query);
        if ($result) {
            echo '<script type="text/javascript"> alert("Product deleted successfully!"); window.location.href="adminmanage.php"; </script>';
            exit();
        } else {
            echo '<script type="text/javascript"> alert("Error deleting product."); window.location.href="adminmanage.php"; </script>';
            exit();
        }
    }else{
        echo '<script type="text/javascript"> alert("There is no product with that id"); window.location.href="adminmanage.php"; </script>';
    }
    } else {
        echo '<script type="text/javascript"> alert("Please fill the id"); window.location.href="adminmanage.php"; </script>';
        exit();
    }
}
?>
