<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <title>Movie Seat Booking</title>
</head>

<body class="seats">

  <?php 
    include('header.php');
  ?>

  <label id="selectime"> Select a time:</label>
  <select id="time">
    <option value="04:00 pm">04:00 pm</option>
    <option value="06:00 pm">06:00 pm</option>
    <option value="08:00 pm">08:00 pm</option>
    <option value="10:00 pm">10:00 pm</option>
    <option value="12:00 pm">12:00 pm</option>
    <option value="01:30 am">01:30 am</option>
  </select>
  </div>

  <table id="seatColor">
    <tr id="row">
      <td>
        <div class="seat"></div><small>Available</small>
      </td>
      <td>
        <div class="seat selected"></div><small>Selected</small>
      </td>
      <td>
        <div class="seat sold"></div><small>Sold</small>
      </td>
    </tr>

  </table>
  <div class="container">
    <br>
    <br>
    <div class="row">
      <div onclick="sendSeatId(1)"></div>
      <div  onclick="sendSeatId(2)"></div>
      <div  onclick="sendSeatId(3)"></div>
      <div  onclick="sendSeatId(4)"></div>
      <div  onclick="sendSeatId(5)"></div>
      <div  onclick="sendSeatId(6)"></div>
      <div  onclick="sendSeatId(7)"></div>
      <div  onclick="sendSeatId(8)"></div>
    </div>

    <div class="row">
      <div class="seat"  onclick="sendSeatId(9)"></div>
      <div class="seat"  onclick="sendSeatId(10)"></div>
      <div class="seat"  onclick="sendSeatId(11)"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat" onclick="sendSeatId(12)"></div>
      <div class="seat" onclick="sendSeatId(13)"></div>
      <div class="seat sold"></div>
    </div>
    <div class="row">
      <div onclick="sendSeatId(14)"></div>
      <div onclick="sendSeatId(15)"></div>
      <div onclick="sendSeatId(16)"></div>
      <div onclick="sendSeatId(17)"></div>
      <div onclick="sendSeatId(18)"></div>
      <div onclick="sendSeatId(19)"></div>
      <div onclick="sendSeatId(20)"></div>
      <div onclick="sendSeatId(21)"></div>
    </div>
    <div class="row">
      <div class="seat"  onclick="sendSeatId(22)"></div>
      <div  class="seat" onclick="sendSeatId(23)"></div>
      <div  class="seat" onclick="sendSeatId(24)"></div>
      <div  class="seat" onclick="sendSeatId(25)"></div>
      <div  class="seat" onclick="sendSeatId(26)"></div>
      <div class="seat"  onclick="sendSeatId(27)"></div>
      <div  class="seat" onclick="sendSeatId(28)"></div>
      <div class="seat"  onclick="sendSeatId(29)"></div>
    </div>
    <div class="row">
      <div class="seat" onclick="sendSeatId(30)"></div>
      <div class="seat" onclick="sendSeatId(31)"></div>
      <div class="seat" onclick="sendSeatId(32)"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat" onclick="sendSeatId(33)"></div>
      <div class="seat" onclick="sendSeatId(34)"></div>
      <div class="seat" onclick="sendSeatId(35)"></div>
    </div>
    <div class="row">
      <div class="seat" onclick="sendSeatId(36)"></div>
      <div class="seat" onclick="sendSeatId(37)"></div>
      <div class="seat" onclick="sendSeatId(38)"></div>
      <div class="seat" onclick="sendSeatId(39)"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat" onclick="sendSeatId(40)"></div>
    </div>
  </div>


  <p class="text">
    You have selected <span id="count">0</span> seat for a price of RS.<span id="total">0</span>
  </p>
  <br>
  <button class="book-seat" role="button" id="book" onclick="bookingSeat()">book!</button>

  <script src="index.js"></script>
</body>
<script>
        var selectedSeats = [];

        function sendSeatId(seatId) {
            var seat = document.getElementsByClassName('seat')[seatId - 1];
            if (seat.classList.contains('selected')) {
                seat.classList.remove('selected');
                selectedSeats = selectedSeats.filter(id => id !== seatId);
            } else {
                seat.classList.add('selected');
                selectedSeats.push(seatId);
            }
            updateCounterAndTotal();
        }

        function updateCounterAndTotal() {
            var countSpan = document.getElementById('count');
            var totalSpan = document.getElementById('total');
            var count = selectedSeats.length;
            var total = count * 100; // Replace 100 with the actual price per seat
            countSpan.textContent = count;
            totalSpan.textContent = total;
        }

        function bookingSeat() {
    if (selectedSeats.length > 0) {
        var currentDate = new URLSearchParams(window.location.search).get('date');
        var currentMovieId = new URLSearchParams(window.location.search).get('id');
        var selectedTime = document.getElementById('time').value;
        var url = 'ShowBill.php?date=' + currentDate + '&id=' + currentMovieId + '&seat_ids=' + selectedSeats.join(',') + '&time=' + encodeURIComponent(selectedTime);
        window.location.href = url;
    } else {
        alert('Please select at least one seat.');
    }
}

    </script>

</html>