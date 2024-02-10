<!DOCTYPE html>

<html>

<head>
    <title>First Level</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
        include 'fetch_query.php';
        if (isset($_GET['id'])) {
            $movie_id = $_GET['id'];
            $query = fetch_all('movie', true, 'id = ' . $movie_id, '1');
            $current_movie = $query->fetch_assoc();
            $dateTime = DateTime::createFromFormat('H:i:s', $current_movie['duration']);
            $formattedTime = $dateTime->format('H \h i \m');
            $genres = fetch_all('genre', false, 'id in (SELECT genre_id FROM movie_genres WHERE movie_id = ' . $movie_id . ')', null);
            $current_day = date("j");
            $current_month = date("M");
            $current_weekday = date("D");
        }
    ?>

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
    <br><br>

        <div class="content-cont">
            <div class="container2" >
            
                <p id = "rcorners1"> </p>
                <!-- the image -->
                <div class="text-block2">
                    <img  src="images/movies/barbie.webp"  >
                </div>
            
                <div class="text-block">
                    <div class="welcome-cont" >
                    <table class="wel-content">
                    
                    <tr>
                                                <!-- content -->
                                                
                            <!-- the name of the name will be retrieved from the DB -->
                          <td class="bil" ><p class="bill" style="font-size: 50px; "><?php echo $current_movie['name'];?> </p></td>                    
                    </tr>

                    <!-- row 2 -->
                    <tr>
                        <td class="bil" ><p class="bill" style="font-size: 30px; ">Date:</p></td>
                         <!-- the date of the movie will be retrieved from the DB -->
                        <td class="bil" ><p class="bill" style="font-size: 30px; "><?php echo $current_movie['name'];?></p></td>
                    </tr>

                     <!-- row 3 -->
                     <tr>
                        <td class="bil"><p class="bill" style="font-size: 30px; ">Time:</p></td>
                         <!-- the time of the movie will be retrieved from the DB -->
                        <td class="bil"><p class="bill" style="font-size: 30px; "><?php echo $current_movie['name'];?> </p></td>
                     </tr>

                     <!-- row 4 -->
                     <tr>
                        <td class="bil"><p class="bill" style="font-size: 30px; ">Seats:</p></td>
                         <!-- the seats of the movie will be retrieved from the DB -->
                        <td class="bil"><p class="bill" style="font-size: 30px; ">E6,E7 </p></td>
                     </tr>

                    <tr>
                        <td class="bil"><p class="bill" style="font-size: 30px; ">Price:</p></td>
                         <!-- the price of the ticket will be retrieved from the DB -->
                        <td class="bil"><p class="bill" style="font-size: 30px; ">70 SAR </p></td>
                    </tr>


                   
                    </table>
        </div>
      <!-- </div> -->
    
    <!-- </div> -->
  </div>  
</div>  

</div>

</body> 

</html>