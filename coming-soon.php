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
        include('header.php');
    ?>

    <br><br>
    <h1 id="Soon"> Comming Soon </h1>

    <div>
        <table id="Movies" align="center">

            <tr>
                <td><a href="spider-man.html"><img
                            src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQFHMCMi3SM6HVf0M-Ua0zLlXgBvdsyTT8JL47mVS58uxEaEPse"
                            width="200" height="300"><br>Spider-Man<br>Action/Adventure</a></td>
                <td><a href="wish.html"><img
                            src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1683544836865-774db6d1-83bf-432f-a924-06493e4e54f3.jpg&w=3840&q=75"
                            width="200" height="300"><br>Wish<br>Comedy/Adventure</a></td>
                <td><img src="https://images.justwatch.com/poster/304329114/s718/mission-impossible-7.%7Bformat%7D"
                        width="200" height="300"><br>Mission: Impossible<br>Action/Adventure</td>
                <td><img src="https://upload.wikimedia.org/wikipedia/ar/thumb/1/13/The_Flash_film_poster_araby.png/260px-The_Flash_film_poster_araby.png"
                        width="200" height="300"><br>The Flash<br>Action/Adventure</td>
            </tr>

            <tr>
                <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQIvVvvDSlYhIlLTRdf0Ww1iAoTQjXEylD61-mQ9ghoPYvZAhhx"
                        width="200" height="300"><br>Extraction 2<br>Action/Thriller</td>
                <td><img src="https://images.justwatch.com/poster/301818741/s592/suzume-no-tojimari" width="200"
                        height="300"><br>Suzume<br>Adventure/Animation</td>
                <td><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSUmeqrk-sWsis5BcoOhv8PQ_HgoKfCodR2gCDfreWqzkipZ3uF"
                        width="200" height="300"><br>The Boogeyman<br>Horror/Mystery</td>
                <td><img src="https://lumiere-a.akamaihd.net/v1/images/p_disney_elemental_v3_793_2a328b27.jpeg?region=0%2C0%2C540%2C810"
                        width="200" height="300"><br>Elemental<br>Animation/Comedy</td>

            </tr>

            <tr>
                <td><img src="https://pbs.twimg.com/media/FvUVt3hXgAAxP1H?format=jpg&name=900x900" width="200"
                        height="300" id="img9"><br>Oppenheimer<br>Drama/War</td>
                <td><img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcSD1MIbeRg7PJAaYo-kx7woXDCUHmYOBW2nAqlQdBEwLuqnJIUH"
                        width="200" height="300"><br>The Roundup No Way Out<br>Adventure</td>
                <td><img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSMnMLOYARaIAuDNAejIcbXu3bWNcUyWKj87Pvh1XLooioIiRro"
                        width="200" height="300"><br>Meg 2: The Trench<br>Adventure</td>
                <td><img src="https://m.media-amazon.com/images/M/MV5BYTNmYWIwOWUtNzk0ZC00MjVmLTkyOWYtZGZhYTMwNTAxYTE5XkEyXkFqcGdeQXVyMTEzMTI1Mjk3._V1_FMjpg_UX1000_.jpg"
                        width="200" height="300"><br>
                    Lonely Castle in the Mirror<br>Animation</td>

            </tr>
        </table>
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