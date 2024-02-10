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
        include 'queries.php';
        $movies = fetch_all('movie');
        $latest_movie = fetch_all('movie', true, null,'1');
        $latest_showing_now = fetch_all('movie', true, 'showing_now = "1"', '4');
        $latest_coming_soon = fetch_all('movie', true, 'showing_now = "0"', '4');
        include('header.php');
    ?>
    
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
                                <a href="movie_details.php?id=<?php echo $showing_now['id'];?>">
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
                    <td>
                        <a href="showing-now.php"><button><i class="fa-solid fa-chevron-right"></i></button></a>
                    </td>
                </tr>
            </table>
            <table id="comingSoon" class="open" style="display:none">
                <tr>
                    <?php 
                        while($coming_soon=$latest_coming_soon->fetch_assoc())
                        {
                    ?>
                            <td>
                                <a href="movie_details.php?id=<?php echo $coming_soon['id'];?>">
                                    <article class="img-posters">
                                        <img
                                            src="<?php echo $coming_soon['poster'];?>">
                                        <article class="poster-content">
                                            <h3><?php echo $coming_soon['name'];?></h3><br>
                                            <p><?php echo $coming_soon['language'];?></p><br>
                                            <p>
                                            <?php 
                                                $genres = fetch_all('genre', false, 'id in (SELECT genre_id FROM movie_genres WHERE movie_id = ' . $coming_soon['id'] . ')', null);
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