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
        <div class="arc-content">
        <?php
        session_start();
        if (isset($_SESSION['id']) && isset($_SESSION['username'])){
        ?>
        <a href="account.php?id=<?php echo $_SESSION['id'];?>">
            <p>Hello <?php echo $_SESSION['username'] ?></p>
        </a>
        <?php
        }else{
        ?>
        <a href="login.php">
            <p>Login / Sign Up</p>
        </a>
        <?php
        }
        ?>
        </div>
    </div>
</header>