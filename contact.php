<?php
  if (isset($_POST["submit"])) {
    $username = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    $to = "muindilewis@zetech.ac.ke";
    $subject = $message;

    $message = "Name: {$username} Email: {$email} Phone: {$phone}  Message: " . $message;

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From:muindilewis@zetech.ac.ke';

    $mail = mail($to,$subject,$message,$headers);

    if ($mail) {
      echo "<script>alert('Mail Send.');</script>";
    }else {
      echo "<script>alert('Mail Not Send.');</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar">
        <div class="nav-center">
            <!-- header -->
            <div class="nav-header">
                <a href="index.php" class="logo">RECIPEHUB</a>
                <!-- links --> 
                <div class="nav-links">
                    <a href="index.php" class="nav-link">Home</a>
                    <a href="about.php" class="nav-link">About</a>
                    <a href="registration.php" class="nav-link">Join</a>
                    <a href="login.php" class="nav-link">Login</a>
                    <a href="upload.php" class="nav-link">Upload</a>
                    <div class="nav-link contact-link">
                        <a href="contact.php" class="btn">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav> <br> <br> <br>
    <!-- end of nav -->

    <div class="container">
      <span class="big-circle"></span>
      <img src="assets/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
           Talk to us and we will reply as soon as we can
          </p>

          <div class="info">
            <div class="information">
              <img src="assets/location.png" class="icon" alt="" />
              <p>Kenya, Nairobi</p>
            </div>
            <div class="information">
              <img src="assets/email.png" class="icon" alt="" />
              <p>lewisshamal@gmail.com</p>
            </div>
            <div class="information">
              <img src="assets/phone.png" class="icon" alt="" />
              <p>+254-113-3614-07</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="https://m.facebook.com/nicky.kiio">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://twitter.com/Lemuel_wis">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="https://www.instagram.com/siwel_king">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form action="" method="post" autocomplete="off">
            <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="name" class="input" />
              <label for="">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" class="input" />
              <label for="">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="tel" name="phone" class="input" />
              <label for="">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea name="message" class="input"></textarea>
              <label for="">Message</label>
              <span>Message</span>
            </div>
            <input type="submit" name="submit" value="Send" class="btn" />
          </form>
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
