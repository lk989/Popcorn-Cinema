<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3a7ef9e254.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Popcorn</title>
</head>

<body>
    <?php
        include 'fetch_query.php';
        $movies = fetch_all('movie');
        $latest_movie = fetch_all('movie', true, null,'1');
        $latest_showing_now = fetch_all('movie', true, 'showing_now = "1"', '2');
        $latest_coming_soon = fetch_all('movie', true, 'showing_now = "0"', '4');
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
    <div class="Guardians-poster">
        <section class="background-opacity"></section>
        <section class="background-content">
        <?php 
            while($movie=$latest_movie->fetch_assoc())
            {
                $dateTime = DateTime::createFromFormat('H:i:s', $movie['duration']);
                $formattedTime = $dateTime->format('H \h i \m');
        ?>
                <h1 class="title"><?php echo $movie['name'];?></h1>
                <p><?php echo $formattedTime . ' . ' . $movie['language']?></p>

                <div class="movie-type">
                <?php 
                    $genres = fetch_all('genre', false, 'id in (SELECT genre_id FROM movie_genres WHERE movie_id = ' . $movie['id'] . ')', null);
                    while($genre=$genres->fetch_assoc())
                    {
                ?>
                    <div class="type"><?php echo $genre['name'];?></div>
                <?php
                    }
                ?>
                </div>
                
                <p><?php echo $movie['description'];?></p>

                <a href="guardians.html"><button class="book-now" role="button">book now!</button></a>
        <?php
            }
        ?>
        </section>
    </div>
    <section class="movie-container">
        <section class="tabs">
            <button onclick="openTap(this, 'showingNow')" class="active">Showing now</button>
            <button onclick="openTap(this, 'comingSoon')">Coming soon</button>
        </section>
        <section class="posters">
            <table id="showingNow" class="open">
                <tr>
                    <?php 
                        while($showing_now=$latest_showing_now->fetch_assoc())
                        {
                    ?>
                            <td>
                                <a href="mario.html">
                                    <article class="img-posters">
                                        <img
                                            src="<?php echo $showing_now['poster'];?>">
                                        <article class="poster-content">
                                            <h3><?php echo $showing_now['name'];?></h3><br>
                                            <p><?php echo $showing_now['language'];?></p><br>
                                            <p>
                                            <?php 
                                                $genres = fetch_all('genre', false, 'id in (SELECT genre_id FROM movie_genres WHERE movie_id = ' . $showing_now['id'] . ')', null);
                                                while($genre=$genres->fetch_assoc())
                                                {
                                                    echo $genre['name'] . ' . ';
                                                }
                                            ?>
                                            </p>
                                        </article>
                                    </article>
                                </a>
                            </td>
                    <?php
                        }
                    ?>
                    <!-- <td>
                        <a href="mario.html">
                            <article class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1683021968077-4a3713d5-eca8-4c32-8491-a11c97175995.jpg&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>THE SUPRE MARIO</h3><br>
                                    <p>English<br>Adventure . Animation</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="mermaid.html">
                            <article class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1682905252634-1183e400-822b-468f-8003-dee7995ffbda.png&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>THE LITTLE MERMAID</h3><br>
                                    <p>English<br>Adventure . Fantasy</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="elshar.html">
                            <article class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1683021991249-6adcdb94-deb2-44db-b987-a0beda8387ed.jpg&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>BA3ED EL SHAR (Arabic)</h3><br>
                                    <p>Arabic<br>Comedy</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="fast.html">
                            <article class="img-posters">
                                <img
                                    src="https://m.media-amazon.com/images/M/MV5BNzZmOTU1ZTEtYzVhNi00NzQxLWI5ZjAtNWNhNjEwY2E3YmZjXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg">
                                <article class="poster-content">
                                    <h3>FAST X</h3><br>
                                    <p>English<br>Action . Crime</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="showing-now.php"><button><i class="fa-solid fa-chevron-right"></i></button></a>
                    </td> -->
                </tr>
            </table>
            <table id="comingSoon" class="open" style="display:none">
                <tr>
                    <td>
                        <a href="spider-man.html">
                            <article id="spider-man" class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1683043451091-cd0d329c-3902-4f28-9fa8-820dafdf974a.jpg&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>SPIDER-MAN</h3><br>
                                    <p>English<br>Adventure . Action</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="barbie.html">
                            <article class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1685356390900-c0f72746-eb43-4def-8aa3-513981ae3b40.jpg&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>BARBIE</h3><br>
                                    <p>English<br>Family</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="wish.html">
                            <article class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1683544836865-774db6d1-83bf-432f-a924-06493e4e54f3.jpg&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>WISH</h3><br>
                                    <p>English<br>Comedy . Adventure</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="hunger.html">
                            <article class="img-posters">
                                <img
                                    src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1684161737451-35183d0a-105f-4cd2-af3a-49b8a206dc01.jpg&w=3840&q=75">
                                <article class="poster-content">
                                    <h3>THE HUNGER GAMES</h3><br>
                                    <p>English<br>Action . Adventure</p>
                                </article>
                            </article>
                        </a>
                    </td>
                    <td>
                        <a href="coming-soon.php"><button><i class="fa-solid fa-chevron-right"></i></button></a>
                    </td>
                </tr>
            </table>
        </section>
    </section>
    <footer class="subscribe-footer">
        <i>Subscribe to recieve our weekly offers!</i>
        <form class="subscription">
            <section>
                <input type="email" class="email" placeholder="Enter your email address">
            </section>
            <button onclick="popAlert()">Subscribe</button>
        </form>
    </footer>
    <script>
        function openTap(e, tabName) {
            var i;
            var x = document.getElementsByClassName("open");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            document.getElementById(tabName).style.display = "block";  
            toggleActive(e, tabName);
        }

        function toggleActive(e, tabName){
            e.classList.add('active');
            if(tabName == 'comingSoon'){
                e.previousElementSibling.classList.remove('active');
            }
            else{
                e.nextElementSibling.classList.remove('active');
            }
        }

        function popAlert() {
            alert("You are now subscribed to Popcorn weekly offers!");
        }
    </script>
</body>

</html>