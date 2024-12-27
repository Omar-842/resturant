
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
            padding: 20px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        hr {
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <h1>Manage Products</h1>
    <form method="POST" action="addproduct.php" enctype="multipart/form-data">
        <h2>Add a Product</h2>
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>
        <label for="productDescription">Product Description:</label>
        <textarea id="productDescription" name="productDescription" required></textarea>
        <label for="productPrice">Product Price:</label>
        <input type="number" id="productPrice" name="productPrice" step="0.01" required>
        <label for="productImage">Product Image:</label>
        <input type="file" id="productImage" name="image"  required>
        <input type="submit" value="Add Product">
    </form>
    <hr>
    <form method="POST" action="deleteproduct.php">
        <h2>Delete Product</h2>
        <label for="productId">Product ID:</label>
        <input type="text" id="productId" name="productId" required>
        <input type="submit" value="Delete Product">
    </form>
    <form method="POST" action="findid.php">
        <h2>Find Id</h2>
        <label for="pname">Product name:</label>
        <input type="text" id="productId" name="pname" required>
        <input type="submit">
    </form>
</body>
</html>
