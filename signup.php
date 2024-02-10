
<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';

?>

<!DOCTYPE HTML>
<html>

<head>
  <link rel="stylesheet" href="register/Register.css">
  <!-- <link rel="stylesheet" href="CssStyleFile\Styleindex.css"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/25c00f3343.js" crossorigin="anonymous"></script>
  <title>login page</title>
</head>

<body>


  <!--logo-->
  <header>
    <nav>
      <ul>
        <li><a href="coming-soon.php" class="wide nav-links">Coming soon</a></li>
        <li><a href="offers.php" class="nav-links">Offers</a></li>
        <li><a href="index.php"><img src="images/logo.png" id="logo"></a></li>
        <li><a href="showing-now.php" class="nav-links">Movies</a></li>
        <li><a href="menu.php" class="nav-links">Menu</a></li>
      </ul>
    </nav>
    <div id="sign-in">
      <div class="arc"></div>
      <a href="login.php">
        <p>Login / Sign Up</p>
      </a>
    </div>
  </header>
  <!--/////////////////////////////////////////////// --->





  <img src="cinema.jpg" width="100%" height="100%" />



  <form action="includes/signup.inc.php" method="post">
    <h3>Enter your informatiom</h3>

    <label for="name"> username:</label>
    <input type="text" id="name"  name ="username" required autocomplete="off" />

    <label for="password"> Password:</label>
    <input type="password" id="password" required  name="pwd" autocomplete="off" />

    <label for="email"> Email </label>
    <input type="text" id="email" required name="email" autocomplete="off" />

    <label for="phone"> phone </label>
    <input type="text" id="phone" required name="phone" autocomplete="off" />

  <label for="birth"> Birthday </label>
  <input type="date" id="birth"  name="birthdate">

<button class="book-now">sign up</button>

  </form>
<?php


check_signup_errors();


?>
</body>

</html>