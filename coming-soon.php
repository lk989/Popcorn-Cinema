<!DOCTYPE html>
<html>

<head>
    <title>Popcorn_Comming Soon</title>
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
        include 'queries.php';
        $all_coming_soon = fetch_all('movie', true, 'showing_now = "0"', null);
        include('header.php');
    ?>

    <br><br>
    <h1 id="Soon"> Comming Soon </h1>

    <div class="grid-container">
    <?php 
        while($coming_soon=$all_coming_soon->fetch_assoc())
            {
        ?>
                <div class="grid-item">
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
                </div>
        <?php
            }
        ?>
    </div>

    <footer class="movie-footer">
        <h1>Old Movies suggestion to show it in the cinema :</h1>
        <form method="POST" id="Search">
            <input type="text" id="Searchtxt" placeholder="Write Movie Name">
            <button id="Searchbtm" type="submit" onclick="msg()">send</button>
        </form>
    </footer>
    <script>
        function msg() {
            alert('Your suggestion was send')
        }
    </script>

</body>

</html>