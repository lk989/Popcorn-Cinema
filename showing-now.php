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
        include 'queries.php';
        $all_showing_now = fetch_all('movie', true, 'showing_now = "1"', null);
        include('header.php');
    ?>
    <br><br>
    <h1 class="showing"> Showing Now : </h1>

    <div class="grid-container">
    <?php 
        while($showing_now=$all_showing_now->fetch_assoc())
            {
        ?>
                <div class="grid-item">
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