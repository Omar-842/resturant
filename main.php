<?php
session_start();
include("connection.php");
$sql = "SELECT image, description, price FROM products";
        $result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Omar's Resturant</title>
    <link
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav class="navbar">
      <div class="navbar-container container">
          <input type="checkbox" name="" id="">
          <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
          </div>
          <ul class="menu-items">
            <li><a href="#home">Home</a></li>
            <li><a href="#food">Category</a></li>
            <li><a href="#food-menu">Menu</a></li>
            <li><a href="#Owners">Owners</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a  href ="shop.php">shop now!</a></li>
            <li><a  href ="adminlogin.php">ADMINSTARTION PAGE</a></li>
          </ul>
          <h1 class="logo">Omar's Resturant</h1>
      </div>
  </nav>
    <section class="showcase-area" id="showcase">
      <div class="showcase-container">
        <h1 class="main-title" id="home">Omar's Resturant</h1>
        
        <a href="#food-menu" class="btn btn-primary">Menu</a>
      </div>
    </section>

    <section id="about">
      <div class="about-wrapper container">
        <div class="about-text">
          <p class="small">About Us</p>
          <h2>WE ARE THE BEST</h2>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ab
            eos omnis, nobis dignissimos perferendis et officia architecto,
            fugiat possimus eaque qui ullam excepturi suscipit aliquid optio,
            maiores praesentium soluta alias asperiores saepe commodi
            consequatur? Perferendis est placeat facere aspernatur!
          </p>
        </div>
        <div class="about-img">
          <img src="https://th.bing.com/th?id=OIP.s7AqvZBPC3ltDaSCcGjhUgHaE8&w=306&h=204&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2" alt="food" />
        </div>
      </div>
    </section>
    <section id="food">
      <h2>Types of food</h2>
      <div class="food-container container">
        <div class="food-type fruite">
          <div class="img-container">
            <img src="https://i.postimg.cc/yxThVPXk/food1.jpg" alt="error" />
            <div class="img-content">
              <h3>fruits</h3>
              <a
                href="https://en.wikipedia.org/wiki/Fruit"
                class="btn btn-primary"
                target="blank"
                >learn more</a
              >
            </div>
          </div>
        </div>
        <div class="food-type vegetable">
          <div class="img-container">
            <img src="https://i.postimg.cc/Nffm6Rkk/food2.jpg" alt="error" />
            <div class="img-content">
              <h3>vegetables</h3>
              <a
                href="https://en.wikipedia.org/wiki/Vegetable"
                class="btn btn-primary"
                target="blank"
                >learn more</a
              >
            </div>
          </div>
        </div>
        <div class="food-type grin">
          <div class="img-container">
            <img src="https://i.postimg.cc/76ZwsPsd/food3.jpg" alt="error" />
            <div class="img-content">
              <h3>grain</h3>
              <a
                href="https://en.wikipedia.org/wiki/Grain"
                class="btn btn-primary"
                target="blank"
                >learn more</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="food-menu">
  <h2 class="food-menu-heading">Food Menu</h2>
  <div class="food-menu-container container">
    <?php 
    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="food-item">';
        
          echo '<div class="food-image-container">';
          echo '<img src="' . $row['image'] . '" alt="Image" class="food-item-image">';
          echo '<div class="overlay">';
          echo '<p class="food-item-description">' . $row['description'] . '</p>';
          echo '<p class="food-item-price">$' . number_format($row['price'], 2) . '</p>';
          echo '<a href="shop.php" class="btn btn-add-to-cart">Add to Cart</a>';
          echo '</div>';
          echo '</div>';
        
        echo '</div>';
      }
    } else {
        echo "<p>No products found</p>";
    }
    ?>
  </div>
</section>
    <section id="Owners" class="Owners">
      <h2 class="testimonial-title"><b>THE OWNER</b></h2>
      <div class="testimonial-container container">
        <div class="testimonial-box">
          <div class="owner-detail">
            <div class="owner-photo">
              <img src="Omar.jpg" alt="" />
              <p class="owner-name">Omar Srayedeen</p>
            </div>
          </div>
          <div class="star-rating">
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
          </div>
          <p class="testimonial-text">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit
            voluptas cupiditate aspernatur odit doloribus non.
          </p>
         
        </div>
      
    </section>
    <section id="contact">
      <div class="contact-container container">
        <div class="contact-img">
          <img src="https://th.bing.com/th/id/R.2770f67b2cd9ed668fa5fad67a9a7652?rik=0eFEPbuce3wFXA&pid=ImgRaw&r=0" alt="" />
        </div>

        <div class="form-container">
          <h2>Contact Us</h2>
          <input type="text" id="submition" placeholder="Your Name" />
          <input type="email"  id="submition" placeholder="E-Mail" />
          <textarea
            cols="30"
            rows="6"
            placeholder="Type Your Message"
          ></textarea>
          <a href="#" id="submition" onClick="submit()" class="btn btn-primary">Submit</a>
        </div>
      </div>
    </section>
    
    <footer id="footer">
      <h2>Restraunt &copy; all rights reserved</h2>
    </footer>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("a").on("click", function (event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $("html, body").animate(
            {
              scrollTop: $(hash).offset().top,
            },
            800,
            function () {
              window.location.hash = hash;
            }
          );
        } 
      });
    });
  </script>
  <style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

  *,
  *::after,
  *::before {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
  }
  
  .html {
    font-size: 62.5%;
  }
  
  body {
    font-family: "Poppins", sans-serif;
  }
  
  
  .container {
    max-width: 1200px;
    width: 90%;
    margin: auto;
  }
  
  .btn {
    display: inline-block;
    padding: 0.5em 1.5em;
    text-decoration: none;
    border-radius: 50px;
    cursor: pointer;
    outline: none;
    margin-top: 1em;
    text-transform: uppercase;
    font-weight: small;
  }
  
  .btn-primary {
    color: #fff;
    background: #16a083;
  }
  
  .btn-primary:hover {
    background: #117964;
    transition: background 0.3s ease-in-out;
  }
  

  .navbar input[type="checkbox"],
  .navbar .hamburger-lines {
    display: none;
  }
  
  .navbar {
    box-shadow: 0px 5px 10px 0px #aaa;
    position: fixed;
    width: 100%;
    background: #fff;
    color: #000;
    opacity: 0.85;
    height: 50px;
    z-index: 12;
  }
  
  .navbar-container {
    display: flex;
    justify-content: space-between;
    height: 64px;
    align-items: center;
  }
  
  .menu-items {
    order: 2;
    display: flex;
  }
  
  .menu-items li {
    list-style: none;
    margin-left: 1.5rem;
    margin-bottom: 0.5rem;
    font-size: 1.2rem;
  }
  
  .menu-items a {
    text-decoration: none;
    color: #444;
    font-weight: 500;
    transition: color 0.3s ease-in-out;
  }
  
  .menu-items a:hover {
    color: #117964;
    transition: color 0.3s ease-in-out;
  }
  
  .logo {
    order: 1;
    font-size: 2.3rem;
    margin-bottom: 0.5rem;
  }
  
  
  .showcase-area {
    height: 50vh;
    background: linear-gradient(
        rgba(240, 240, 240, 0.144),
        rgba(255, 255, 255, 0.336)
      ),
      url("https://i.postimg.cc/wT3TQS3V/header-image2.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
  }
  
  .showcase-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
    font-size: 1.6rem;
  }
  
  .main-title {
    text-transform: uppercase;
    margin-top: 1.5em;
  }
  
  
  #about {
    padding: 50px 0;
    background: #f5f5f7;
  }
  
  .about-wrapper {
    display: flex;
    flex-wrap: wrap;
  }
  
  #about h2 {
    font-size: 2.3rem;
  }
  
  #about p {
    font-size: 1.2rem;
    color: #555;
  }
  
  #about .small {
    font-size: 1.2rem;
    color: #666;
    font-weight: 600;
  }
  
  .about-img {
    flex: 1 1 400px;
    padding: 30px;
    transform: translateX(150%);
    animation: about-img-animation 1s ease-in-out forwards;
  }
  
  @keyframes about-img-animation {
    100% {
      transform: translate(0);
    }
  }
  
  .about-text {
    flex: 1 1 400px;
    padding: 30px;
    margin: auto;
    transform: translate(-150%);
    animation: about-text-animation 1s ease-in-out forwards;
  }
  
  @keyframes about-text-animation {
    100% {
      transform: translate(0);
    }
  }
  
  .about-img img {
    display: block;
    height: 400px;
    max-width: 100%;
    margin: auto;
    object-fit: cover;
    object-position: right;
  }
  
  
  #food {
    padding: 5rem 0 10rem 0;
  }
  
  #food h2 {
    text-align: center;
    font-size: 2.5rem;
    font-weight: 400;
    margin-bottom: 40px;
    text-transform: uppercase;
    color: #555;
  }
  
  .food-container {
    display: flex;
    justify-content: space-between;
  }
  
  .food-container img {
    display: block;
    width: 100%;
    margin: auto;
    max-height: 300px;
    object-fit: cover;
    object-position: center;
  }
  
  .img-container {
    margin: 0 1rem;
    position: relative;
  }
  
  .img-content {
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%, -50%);
    opacity: 0;
    z-index: 2;
    text-align: center;
    transition: all 0.3s ease-in-out 0.1s;
  }
  
  .img-content h3 {
    color: #fff;
    font-size: 2.2rem;
  }
  
  .img-content a {
    font-size: 1.2rem;
  }
  
  .img-container::after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.871);
    opacity: 0;
    z-index: 1;
  
    transform: scaleY(0);
    transform-origin: 100% 100%;
    transition: all 0.3s ease-in-out;
  }
  
  .img-container:hover::after {
    opacity: 1;
    transform: scaleY(1);
  }
  
  .img-container:hover .img-content {
    opacity: 1;
    top: 40%;
  }
  
  
  .food-menu-heading {
    text-align: center;
    font-size: 3.4rem;
    font-weight: 400;
    color: #666;
  }
  
  .food-menu-container {
    display: flex;
    flex-wrap: wrap;
    padding: 50px 0px 30px 0px;
  }
  
  .food-menu-container img {
    display: block;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    object-fit: cover;
    object-position: center;
  }
  
  .food-menu-item {
    display: flex;
    flex: 1 1 600px;
    justify-content: space-evenly;
    margin-bottom: 3rem;
  }
  
  .food-description {
    margin: auto 1.5rem;
  }
  
  .font-title {
    font-size: 1.8rem;
    font-weight: 400;
    color: #444;
  }
  
  .food-description p {
    font-size: 1.4rem;
    color: #555;
    font-weight: 500;
  }
  
  .food-description .food-price {
    color: #117964;
    font-weight: 700;
  }
  
  
  #testimonials {
    padding: 5rem 0;
    background: rgba(243, 243, 243);
  }
  
  .testimonial-title {
    text-align: center;
    font-size: 2.8rem;
    font-weight: 400;
    color: #555;
  }
  
  .testimonial-container {
    display: flex;
    justify-content: space-between;
    font-size: 1.4rem;
    padding: 1rem;
  }
  
  .testimonial-box .checked {
    color: #ff9529;
  }
  
  .testimonial-box .testimonial-text {
    margin: 1rem 0;
    color: #444;
  }
  
  .testimonial-box {
    text-align: center;
    padding: 1rem;
  }
  
  .owner-photo img {
    display: block;
    width: 150px;
    height: 150px;
    object-fit: cover;
    object-position: center;
    border-radius: 50%;
    margin: auto;
  }
  
  
  #contact {
    padding: 5rem 0;
    background: rgb(226, 226, 226);
  }
  
  .contact-container {
    display: flex;
    background: #fff;
  }
  
  .contact-img {
    width: 50%;
  }
  
  .contact-img img {
    display: block;
    height: 400px;
    width: 100%;
    object-position: center;
    object-fit: cover;
  }
  
  .form-container {
    padding: 1rem;
    width: 50%;
    margin: auto;
  }
  
  .form-container input {
    display: block;
    width: 100%;
    border: none;
    border-bottom: 2px solid #ddd;
    padding: 1rem 0;
    box-shadow: none;
    outline: none;
    margin-bottom: 1rem;
    color: #444;
    font-weight: 500;
  }
  
  .form-container textarea {
    display: block;
    width: 100%;
    border: none;
    border-bottom: 2px solid #ddd;
    color: #444;
    outline: none;
    padding: 1rem 0;
    resize: none;
  }
  
  .form-container h2 {
    font-size: 2.7rem;
    font-weight: 500;
    color: #444;
    margin-bottom: 1rem;
    margin-top: -1.2rem;
  }
  
  .form-container a {
    font-size: 1.3rem;
  }
  
  #footer h2 {
    text-align: center;
    font-size: 1.8rem;
    padding: 2.6rem;
    font-weight: 500;
    color: #fff;
    background: rgb(65, 65, 65);
  }
  
  
  @media (max-width: 768px) {
    .navbar {
      opacity: 0.95;
    }
  
    .navbar-container input[type="checkbox"],
    .navbar-container .hamburger-lines {
      display: block;
    }
  
    .navbar-container {
      display: block;
      position: relative;
      height: 64px;
    }
  
    .navbar-container input[type="checkbox"] {
      position: absolute;
      display: block;
      height: 32px;
      width: 30px;
      top: 20px;
      left: 20px;
      z-index: 5;
      opacity: 0;
    }
  
    .navbar-container .hamburger-lines {
      display: block;
      height: 23px;
      width: 35px;
      position: absolute;
      top: 17px;
      left: 20px;
      z-index: 2;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
  
    .navbar-container .hamburger-lines .line {
      display: block;
      height: 4px;
      width: 100%;
      border-radius: 10px;
      background: #333;
    }
  
    .navbar-container .hamburger-lines .line1 {
      transform-origin: 0% 0%;
      transition: transform 0.4s ease-in-out;
    }
  
    .navbar-container .hamburger-lines .line2 {
      transition: transform 0.2s ease-in-out;
    }
  
    .navbar-container .hamburger-lines .line3 {
      transform-origin: 0% 100%;
      transition: transform 0.4s ease-in-out;
    }
  
    .navbar .menu-items {
      padding-top: 100px;
      background: #fff;
      height: 100vh;
      max-width: 300px;
      transform: translate(-150%);
      display: flex;
      flex-direction: column;
      margin-left: -40px;
      padding-left: 50px;
      transition: transform 0.5s ease-in-out;
      box-shadow: 5px 0px 10px 0px #aaa;
    }
  
    .navbar .menu-items li {
      margin-bottom: 1.5rem;
      font-size: 1.3rem;
      font-weight: 500;
    }
  
    .logo {
      position: absolute;
      top: 5px;
      right: 15px;
      font-size: 2rem;
    }
  
    .navbar-container input[type="checkbox"]:checked ~ .menu-items {
      transform: translateX(0);
    }
  
    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line1 {
      transform: rotate(35deg);
    }
  
    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line2 {
      transform: scaleY(0);
    }
  
    .navbar-container input[type="checkbox"]:checked ~ .hamburger-lines .line3 {
      transform: rotate(-35deg);
    }
  
  
    .food-container {
      flex-direction: column;
      align-items: stretch;
    }
  
    .food-type:not(:last-child) {
      margin-bottom: 3rem;
    }
  
    .food-type {
      box-shadow: 5px 5px 10px 0 #aaa;
    }
  
    .img-container {
      margin: 0;
    }
  }
  
  @media (max-width: 500px) {
    html {
      font-size: 65%;
    }
  
    .navbar .menu-items li{
        font-size: 1.6rem;
    }
  
    .testimonial-container {
      flex-direction: column;
      text-align: center;
    }
  
    .food-menu-container img {
      margin: auto;
    }
  
    .food-menu-item {
      flex-direction: column;
      text-align: center;
    }
  
    .form-container {
      width: 90%;
    }
  
    .contact-container {
      display: flex;
      flex-direction: column;
    }
  
    .contact-img {
      width: 90%;
      margin: 3rem auto;
    }
  
    .logo {
      position: absolute;
      top: 06px;
      right: 15px;
      font-size: 3rem;
    }
  
    .navbar .menu-items li {
      margin-bottom: 2.5rem;
      font-size: 1.8rem;
      font-weight: 500;
    }
  }
  
  @media (min-width: 769px) and (max-width: 1200px) {
    .img-container h3 {
      font-size: 1.5rem;
    }
  
    .img-container .btn {
      font-size: 0.7rem;
    }
  }
  
  @media (orientation: landscape) and (max-height: 500px) {
    .showcase-area {
      height: 50vmax;
    }
  }
</style>
    <script>
function submit(){
  let inputElement = document.getElementById('submition');
        inputElement.value = '';
        alert("Thank You For Contacting Us");
    
}
const closeBtn = document.getElementById('close');
const modalMenu = document.getElementById('modal');
const modalBtn = document.querySelector('.modal__button');

setTimeout(() => {
    modalMenu.classList.add('show');
}, 3000);
/* General Styles */
body {
  font-family: 'Roboto', sans-serif;
  background-color: #f4f7fc;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.food-menu-heading {
  text-align: center;
  font-size: 3.6rem;
  font-weight: 600;
  color: #444;
  margin-bottom: 60px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.food-menu-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 30px;
  padding: 50px 10%;
}

/* Individual Food Item Styling */
.food-item {
  position: relative;
  border-radius: 20px;
  background: linear-gradient(135deg, #ff7e5f, #feb47b);
  overflow: hidden;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.food-item:hover {
  transform: scale(1.05);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
}

.food-image-container {
  position: relative;
  overflow: hidden;
}

.food-item-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 15px;
  transition: transform 0.4s ease-in-out;
}

.food-item:hover .food-item-image {
  transform: scale(1.1);
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.6);
  color: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.4s ease-in-out;
  border-radius: 15px;
}

.food-item:hover .overlay {
  opacity: 1;
}

.food-item-description {
  font-size: 1.6rem;
  margin-bottom: 15px;
  text-align: center;
  font-weight: 300;
}

.food-item-price {
  font-size: 2rem;
  color: #f1c40f;
  margin-bottom: 25px;
  font-weight: 600;
}

.btn-add-to-cart {
  background-color: #16a083;
  color: #fff;
  padding: 0.8em 1.5em;
  text-decoration: none;
  border-radius: 50px;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-size: 1.3rem;
  transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.btn-add-to-cart:hover {
  background-color: #117964;
  transform: translateY(-5px);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
}

/* Mobile Responsiveness */
@media screen and (max-width: 768px) {
  .food-menu-container {
    padding: 50px 5%;
  }

  .food-menu-heading {
    font-size: 3rem;
  }
}

@media screen and (max-width: 480px) {
  .food-item {
    margin-bottom: 20px;
  }

  .food-item-description {
    font-size: 1.4rem;
  }

  .food-item-price {
    font-size: 1.6rem;
  }

  .btn-add-to-cart {
    font-size: 1.1rem;
  }
  
}



  </script>
  </body>
  
  <footer id="footer">
    <h2>Resturant &copy; all rights reserved</h2>
  </footer>
 </html>




