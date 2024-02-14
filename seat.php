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
    $show_id = $_GET['show_id'];
    $user_id = $_GET['userid'] ?? null;
    setcookie('showid',$show_id , time() + 1800, '/', 'localhost', true, true);
    $show_query = fetch_all('shows', false, "id = '$show_id'", null);
    $show = $show_query->fetch_assoc();
    $booking_query = fetch("SELECT `label` 
    FROM `seat` 
    WHERE `label` IN (SELECT `seat_id` FROM `booking` WHERE `show_id` = $show_id)");
    $booking_seats = [];
    while($booking = $booking_query->fetch_assoc()){
        array_push($booking_seats, $booking['label']);
    }
    // echo $bookings;
    $seats = fetch_all('seat', false, null, null);
?>

<div class="seat-container">
    <div class="seat-description">
        <div class="seat-description-container">
            <div class="seat"></div>
            <div>Available</div>
        </div>
        <div class="seat-description-container">
            <div class="seat" style="background-color: #DFB055;"></div>
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

            <div id="<?php echo $seat['label']?>" class="seat-grid-item seat <?php echo in_array($seat['label'], $booking_seats) ? 'sold' : ''?>"  <?php echo in_array($seat['label'], $booking_seats) ? '' : "onclick='selectSeat(this)'"?>></div>
        <?php
            }
        ?>
    </div>
    <p class="booking-price">
    You have selected <span id="count">0</span> seat for a price of RS.<span id="total">0</span>
  </p>
  <br>
  <div class="booking-btn">
      <button class="book-seat" role="button" id="book" onclick="bookingSeat()">book!</button>
  </div>
</div>

    <script>
        var selectedSeats = [];
        var countSpan = document.getElementById('count');
        var totalSpan = document.getElementById('total');
        function selectSeat(element){
            element.classList.toggle('selected');
            updateCounterAndTotal();
        }

        function updateCounterAndTotal() {
            var count = document.getElementsByClassName('selected').length;
            console.log(count)
            var total = count * new URLSearchParams(window.location.search).get('price');
            countSpan.textContent = count;
            totalSpan.textContent = total;
        }

        function bookingSeat() {
            let user_id = <?php echo json_encode($_SESSION['id']); ?>;
            let selected = Array.from(document.querySelectorAll('.selected'));
            let selectedSeats = selected.map(function(seat) {
                return seat.id;
            });
            if (selectedSeats.length > 0) {
                if(user_id == '' || user_id == null){
                    alert('You should sign in first')
                }
                else{
                    var currentDate = <?php echo json_encode($show['date']); ?>;
                    var currentMovieId = <?php echo json_encode($show['movie_id']); ?>;
                    var currentShowId = <?php echo json_encode($show['id']); ?>;
                    // var selectedTime = document.getElementById('time').value;
                    var url = 'ShowBill.php?date=' + currentDate + '&id=' + currentMovieId + '&seat_ids=' + selectedSeats.join(',') + /* '&time=' + encodeURIComponent(selectedTime) + */'&price=' + totalSpan.textContent + '&userid=' + user_id;
                    window.location.href = url;
                    updateCounterAndTotal();
                    selectedSeats = [];
                }
            } else {
                alert('Please select at least one seat.');
            }
        }

        function clearSelectedSeats() {
            selectedSeats = [];
            updateCounterAndTotal();
        }

        // Run clearSelectedSeats() when the page loads
        document.addEventListener('DOMContentLoaded', clearSelectedSeats);

        // Check if sessionStorage has selected seats on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (sessionStorage.getItem('selectedSeats')) {
            selectedSeats = JSON.parse(sessionStorage.getItem('selectedSeats'));
            updateCounterAndTotal();
            }
        });

        // Save selected seats to sessionStorage before page reload
        window.addEventListener('beforeunload', function() {
            sessionStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
        });
    </script>
</body>

</html>