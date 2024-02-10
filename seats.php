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
    <option value="150">04:00 pm</option>
    <option value="150">06:00 pm</option>
    <option value="150">08:00 pm</option>
    <option value="150">10:00 pm</option>
    <option value="150">12:00 pm</option>
    <option value="150">01:30 am</option>
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
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>

    <div class="row">
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
    </div>
    <div class="row">
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
    </div>
    <div class="row">
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat sold"></div>
      <div class="seat"></div>
    </div>
  </div>

  <p class="text">
    You have selected <span id="count">0</span> seat for a price of RS.<span id="total">0</span>
  </p>
  <br>
  <button class="book-seat" role="button" id="book" onclick="bookingSeat()">book!</button>

  <script src="index.js"></script>
</body>

</html>