<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="register/Register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/25c00f3343.js" crossorigin="anonymous"></script>
    <title>account page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>

<body>

    <?php
        include 'queries.php';
        include 'header.php';
        $id = $_GET['id'];
        $user_query = fetch_all('user', false, "id = $id", '1');
        $user = $user_query->fetch_assoc();
    ?>

    <?php if (isset($_GET['error'])) { ?>
   		<p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>

    <form action="edit_account.php" method="post">
        <h3>Update your Information </h3>

        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label for="name"> username:</label>
        <input type="text" id="name" name="username" required value="<?php echo $user['username']; ?>" disabled/>

        <label for="password"> Password:</label>
        <input type="password" id="password" required name="pwd" autocomplete="off" placeholder="password"/>

        <button class="book-now">Update password</button>
        <div class="account-actions">
            <a href="delete_account.php?id=<?php echo $id ?>">
                <button type="button" class="account-btn delete">Delete account</button>
            </a>
            <a href="logout.php?id=<?php echo $id ?>">
                <button type="button" class="account-btn logout">Logout</button>
            </a>
        </div>
    </form>

</body>
</html>