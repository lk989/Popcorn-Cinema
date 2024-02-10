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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>
    <?php
      include 'header.php';
    ?>

    <?php if (isset($_GET['error'])) { ?>
   		<p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <form action="handle_login.php" method="post">
        <h3>Enter your informatiom</h3>

        <label for="name"> username:</label>
        <input type="text" id="name" name="username" required/>

        <label for="password"> Password:</label>
        <input type="password" id="password" required name="pwd" autocomplete="off" />

        <button class="book-now">log in</button>
        <p class="account">
        Doesn't have an account? 
        <a href="signup.php" >signup</a>
        </p>
    </form>

</body>
</html>