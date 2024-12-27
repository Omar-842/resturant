<?php
session_start();
include("connection.php");
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else {
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Omar's Restaurant - Online Shopping</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), 
       url('https://source.unsplash.com/1600x900/?restaurant,food') no-repeat center center fixed;
      background-size: cover;
      color: #ffffff;
      animation: fadeIn 2s ease-in-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    header {
      background: rgba(0, 0, 0, 0.7);
      color: white;
      padding: 30px 0;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
    }

    header h1 {
      margin: 0;
      font-size: 3.5em;
      letter-spacing: 3px;
      text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.8);
    }

    header p {
      margin: 10px 0 0;
      font-size: 1.3em;
    }

    header a {
      color: #ff6f61;
      text-decoration: none;
      font-weight: bold;
      transition: color 0.3s;
    }

    header a:hover {
      color: #ffffff;
    }

    #cart {
      position: fixed;
      top: 20px;
      right: 20px;
      background: rgba(255, 255, 255, 0.95);
      padding: 20px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      border-radius: 15px;
      z-index: 100;
      color: #333333;
    }

    #cart h3 {
      margin-top: 0;
      color: #ff6f61;
    }

    #cart ul {
      list-style: none;
      padding: 0;
      max-height: 150px;
      overflow-y: auto;
    }

    #cart ul li {
      padding: 5px 0;
      border-bottom: 1px dashed #ddd;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #cart p {
      font-weight: bold;
      font-size: 1.2em;
    }

    #products {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 40px;
      justify-content: center;
    }

    .product {
      width: 260px;
      padding: 20px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      text-align: center;
      transform: translateY(0);
      transition: transform 0.3s, box-shadow 0.3s;
      color: #333333;
      overflow: hidden;
    }

    .product:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .product img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 10px;
      transition: transform 0.3s ease;
    }

    .product:hover img {
      transform: scale(1.1);
    }

    .product button {
      margin-top: 10px;
      padding: 12px 18px;
      background-color: #ff6f61;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1em;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .product button:hover {
      background-color: #e55b50;
    }

    footer {
      margin-top: 50px;
      text-align: center;
      padding: 20px 0;
      background: rgba(0, 0, 0, 0.7);
      color: white;
    }

    footer p {
      margin: 0;
      font-size: 1.2em;
    }

    footer a {
      color: #ff6f61;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <header>
    <h1>Welcome to Omar's Restaurant</h1>
    <p>Hello, <?php echo $_SESSION['username']; ?>! <a href="logout.php">Logout</a></p>
  </header>

  <div id="cart">
    <h3>Your Cart</h3>
    <ul id="cart-items"></ul>
    <p id="total">Total: $0</p>
    <button id="submit-btn">Submit Order</button>
  </div>

  <div id="products">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product">';
            echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '<p>' . $row['name'] . '</p>';
            echo '<p>Price: $' . $row['price'] . '</p>';
            echo '<button onclick="addToCart(\'' . $row['name'] . '\', ' . $row['price'] . ')">Add to Cart</button>';
            echo '</div>';
        }
    } else {
        echo "<p>No products available.</p>";
    }
  }
    ?>
  </div>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Omar's Restaurant. All rights reserved. | <a href="#">Privacy Policy</a></p>
  </footer>

  <script>
    let total = 0;

    function addToCart(productName, price) {
      const cartList = document.getElementById("cart-items");

      // Create a new list item for the cart
      const cartItem = document.createElement("li");
      cartItem.textContent = productName + " - $" + price;

      // Create a delete button
      const deleteButton = document.createElement("button");
      deleteButton.textContent = "Delete";
      deleteButton.style.marginLeft = "10px";
      deleteButton.style.backgroundColor = "#e55b50";
      deleteButton.style.color = "white";
      deleteButton.style.border = "none";
      deleteButton.style.borderRadius = "5px";
      deleteButton.style.padding = "5px 10px";
      deleteButton.style.cursor = "pointer";

      // Attach a click event to the delete button
      deleteButton.onclick = function () {
        cartList.removeChild(cartItem); // Remove the cart item from the list
        total -= price; // Update the total price
        document.getElementById("total").textContent = "Total: $" + total;
      };

      // Append the delete button to the cart item
      cartItem.appendChild(deleteButton);

      // Add the cart item to the cart list
      cartList.appendChild(cartItem);

      // Update the total price
      total += price;
      document.getElementById("total").textContent = "Total: $" + total;
    }

    document.getElementById("submit-btn").onclick = function () {
      if (total > 0) {
        alert("Please confirm your card information.");
        window.location.href = "ccard.php";
      } else {
        alert("Cart is empty!");
      }
    };
  </script>

</body>
</html>
<?php  ?>
