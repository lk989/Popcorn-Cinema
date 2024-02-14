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
    include('header.php');
    include('queries.php');
    $date = $_GET['date'];
    $id = $_GET['id'];
    $show_query = fetch_all('shows', false, "date = '$date' AND movie_id = '$id'", null);
    $seats = fetch_all('seat', false, null, null);
?>

<div class="time-container">
    <label for="time" id="selectime"> Select a time:</label>
    <select id="time" name="show-time">
        <?php
        if(mysqli_num_rows($show_query) > 0){
            while($shows = $show_query->fetch_assoc()){
        ?>
                <option value="<?php echo $shows['id']?>"><?php echo $shows['time']?></option>
                <?php
            }}else{
                ?>
            <option value="0" selected>No available show time</option>
        <?php
            }
        ?>
    </select>
</div>
<div class="seat-container">
    <div class="seat-description">
        <div class="seat-description-container">
            <div class="seat"></div>
            <div>Available</div>
        </div>
        <div class="seat-description-container">
            <div class="seat selected"></div>
            <div>Selected</div>
        </div>
        <div class="seat-description-container">
            <div class="seat sold"></div>
            <div>Sold</div>
        </div>
    </div>
    <div class="seats-grid">
    <?php
        while($seat = $seats->fetch_assoc()){
        ?>
            <div id="<?php echo $shows['label']?>" class="seat-grid-item seat" onclick="selectSeat(this)"></div>
        <?php
            }
        ?>
    </div>
    <p class="booking-price">
    You have selected <span id="count">0</span> seat for a price of RS.<span id="total">0</span>
  </p>
  <br>
  <button class="book-seat" role="button" id="book" onclick="bookingSeat()">book!</button>
</div>

<script>
    function selectSeat(element){
        element.classList.toggle('selected');
    }
    var selectedSeats = [];
    var countSpan = document.getElementById('count');
    var totalSpan = document.getElementById('total');
</script>
</body>

</html>