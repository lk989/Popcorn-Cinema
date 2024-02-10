
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
    <?php
      include('header.html');
    ?>
    <!--/////////////////////////////////////////////// --->

    <!-- <img src="cinema.jpg" width="100%" height="100%" /> -->

    <?php if (isset($_GET['error'])) { ?>
   		<p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

  <form action="handle_signup.php" method="post">
    <h3>Enter your informatiom</h3>

    <label for="name"> Username:</label>
    <?php if (isset($_GET['username'])) { ?>
      <input required type="text" name="username" placeholder="Username" value="<?php echo $_GET['username']; ?>"><br>
    <?php }else{ ?>
      <input required type="text" name="username" placeholder="Name"><br>
    <?php }?>
    
    <label for="password"> password:</label>
    <?php if (isset($_GET['password'])) { ?>
      <input required type="password" name="pwd" placeholder="Password" value="<?php echo $_GET['password']; ?>"><br>
    <?php }else{ ?>
      <input required type="password" name="pwd" placeholder="Password"><br>
    <?php }?>
    
    <label for="email"> Email:</label>
    <?php if (isset($_GET['email'])) { ?>
      <input required type="ameil" name="email" placeholder="email" value="<?php echo $_GET['email']; ?>" autocomplete="off"><br>
    <?php }else{ ?>
      <input required type="ameil" name="email" placeholder="email" autocomplete="off"><br>
    <?php }?>

    <label for="phone"> phone:</label>
    <?php if (isset($_GET['phone'])) { ?>
      <input required type="phone" name="phone" placeholder="phone" value="<?php echo $_GET['phone']; ?>" ><br>
    <?php }else{ ?>
      <input required type="phone" name="phone" placeholder="phone" ><br>
    <?php }?>

    <label for="birthdate"> birthdate:</label>
    <?php if (isset($_GET['birthdate'])) { ?>
      <input type="date" name="birthdate" placeholder="birthdate" value="<?php echo $_GET['birthdate']; ?>"><br>
    <?php }else{ ?>
      <input type="date" name="birthdate" placeholder="birthdate"><br>
    <?php }?>
    
<button class="book-now">sign up</button>

  </form>
<?php


// check_signup_errors();

?>

</body>

</html>