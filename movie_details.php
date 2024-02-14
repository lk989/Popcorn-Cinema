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
        if (isset($_GET['id'])) {
            $current_movie_id = $_GET['id'];
            $query = fetch_all('movie', true, 'id = ' . $current_movie_id, '1');
            $current_movie = $query->fetch_assoc();
            // $query_shows = fetch_all('movie', true, 'id = ' . $current_movie_id, '1');
            // $query_shows = fetch_all('shows', false, 'movie_id = ' . $current_movie_id, null);
            // $shows = $query_shows->fetch_assoc();
            $dateTime = DateTime::createFromFormat('H:i:s', $current_movie['duration']);
            $formattedTime = $dateTime->format('H \h i \m');
            $genres = fetch_all('genre', false, 'id in (SELECT genre_id FROM movie_genres WHERE movie_id = ' . $current_movie_id . ')', null);
            $current_day = date("j");
            $current_month = date("M");
            $current_weekday = date("D");
        }
    ?>
    <?php 
        include('header.php');
    ?>
    <div class="details-poster">
        <div class="details-poster-container">
            <img src="<?php echo $current_movie['poster'];?>" alt="" class="big-poster">
        </div>
        <section class="movie-content">
                <h1 class="title" id="title"><?php echo $current_movie['name'];?></h1>
                <p id="duration"><?php echo $formattedTime . ' . ' . $current_movie['language']?></p>
                <div class="movie-type">
                <?php 
                    while($genre=$genres->fetch_assoc())
                    {
                ?>
                    <div class="type"><?php echo $genre['name'];?></div>
                <?php
                    }
                ?>
                </div>
                <p id="synopsis"><?php echo $current_movie['description'];?></p>
            </section>
    </div>
    <div class="booking">
        <div class="movie-poster"></div>
        <?php
            if($current_movie['showing_now'] == 1){

        ?>
                <section class="days">
                    <table>
                        <tr>
                        <?php
                            $start_of_week = date('Y-m-d');
                            $end_of_week = date('Y-m-d', strtotime('+6 days'));

                            for ($i = 0; $i < 7; $i++) {
                                $date = date('Y-m-d', strtotime("$start_of_week +$i days"));

                                $query_shows = fetch("SELECT id FROM shows WHERE date = '$date' AND movie_id = $current_movie_id");
                                $num_shows = mysqli_num_rows($query_shows);
                                if ($num_shows > 0) {
                                    $row_shows = $query_shows->fetch_assoc();
                                }
                        ?>
                                <td class="<?php if ($num_shows == 0) echo 'disabled-container' ?>">
                                

                                <a href="seat.php?show_id=<?php echo $row_shows['id'] ?>&price=<?php echo $current_movie['price'] ?>" class="<?php if ($num_shows == 0) echo 'disabled-link' ?>"><?php echo $date ?></a><br>

                                </td>
                        <?php
                            }
                        ?>

                    
                        </tr>
                    </table>
                    <section class="cinema-class">
                        <img src="images/movie.png" width="90px" height="90px">
                        <article>
                            <b>Standard</b><br>Enjoy our comfy standard cinema experience with your friends and family where
                            there is the regular leather cinema seating closer to the screen or the more comfortable Premium
                            seats at the back. You can also pass by our concession area where you can pick the most delicious
                            food and beverage for you.
                        </article>
                    </section>
                </section>
        <?php
            }else{
        ?>
            <div class="days coming-soon">Coming Soon !!</div>
        <?php
            }
        ?>
    </div>
</body>

</html>