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
    <h1 class="showing"> Showing Now : </h1>

    <table id="Movies">
        <tr>
            <td><a href="mario.html"><img
                        src="https://etbilarabi.com/sites/default/files/inline-/images/0BE55DEF-CCC7-49EE-A52F-51BC31125588.jpeg"
                        width="200" height="300"><br>The Super Mario Bros<br>Adventure/Fantasy</a></td>
            <td><a href="mermaid.html"><img
                        src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1682905252634-1183e400-822b-468f-8003-dee7995ffbda.png&w=3840&q=75"
                        width="200" height="300"><br>The Little Mermaid<br>Adventure/Fantasy</a></td>
            <td><img src="https://www.themoviedb.org/t/p/original/8Ga1CI4ZIIF8fxyfjZ5sNlb75e4.jpg" width="200"
                    height="300"><br> A Whisker Away<br>Fantasy/Romance</td>
            <td><img src="https://th.bing.com/th/id/OIP.m_OYFvtzjIOnppssXLg3AgHaK9?pid=ImgDet&rs=1" width="200"
                    height="300"><br>Adam Project<br>Sci-fi/Drama</td>
        </tr>


        <tr>

            <td><img src="https://th.bing.com/th/id/OIP.Dgv015cofac8Mv-HwImQYwAAAA?pid=ImgDet&rs=1" width="200"
                    height="300"><br>Turning Red<br>Fantasy/Comedy</td>
            <td><img src="https://th.bing.com/th/id/R.53181b5658f102b10ca1f22c64bcdbce?rik=m2EPXF%2bwKaTwFA&pid=ImgRaw&r=0"
                    width="200" height="300"><br>Top Gun: Maverick<br>Action/Adventure</td>
            <td><img src="https://cdn.traileraddict.com/content/pixar-disney/coco-2017-4.jpg" width="200"
                    height="300"><br>Coco<br>Family/Comedy</td>
            <td><img src="https://www.bing.com/th?id=OIP.At011FrNqyDEtglatOSGGwHaK9&w=150&h=222&c=8&rs=1&qlt=90&o=6&dpr=1.3&pid=3.1&rm=2"
                    width="200" height="300"><br>Seoul Vibe<br>Crime</td>

        </tr>


        <tr>

            <td><img src="https://image.tmdb.org/t/p/original/esbfojkHBEyMlIcv2VGW3fCzlzH.jpg" width="200"
                    height="300"><br>Zootopia<br>Family/Adventure</td>
            <td><img src="https://th.bing.com/th/id/R.011d0f9ceea10e0f9ab2fc8d1fff6ddd?rik=46tRZhLjPLn6SA&pid=ImgRaw&r=0"
                    width="200" height="300"><br>Loca<br>Comedy/Fantasy</td>
            <td><img src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1683022287134-909a752f-b7d8-4e53-8ae6-55b10e29f204.jpg&w=3840&q=75"
                    width="200" height="300"><br>Gohn Wick: Chapter 4<br>Action/Neo-noir</td>
            <td><img src="https://www.muvicinemas.com/_next/image?url=https%3A%2F%2Fd3th1nqbpcyfdw.cloudfront.net%2F1684766169897-59a5021e-e25c-4e97-b930-72bdefaa10fc.jpg&w=3840&q=75"
                    width="200" height="300"><br>The Boogeyman<br>Horror/Mystery</td>

        </tr>


    </table>

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