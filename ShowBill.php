<!DOCTYPE html>
<html>

<head>
    <title>Bill</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@300;400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ticket.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

.book-now-container {
  justify-content: center;
  margin-top: 80px; /* Adjust as needed */
}

.book-now {
  background-color: var(--purple);
  font-family: "Staatliches", cursive;
  font-size: 14px;


  border: 0;
  border-radius: 100px;
  color: white;
  cursor: pointer;
  font-family: inherit;
  font-size: 1.8rem;
  line-height: 35px;
  text-align: center; /* Center text horizontally */
  width: 200px;
  transition: transform 0.2s;
}

.book-now:hover { 
  background-color: var(--gray);
  color: white;
  transform: scale(1.1);
}


   </style>
</head>

<body>

<?php
include 'queries.php';
if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];
    $user_id = $_GET['userid'] ?? null;
    $query = fetch_all('movie', true, 'id = ' . $movie_id, '1');
    $current_movie = $query->fetch_assoc();
    date_default_timezone_set('Asia/Riyadh'); // Set timezone to Middle East (Riyadh)
    $current_time = date("h:i A"); // Current time in "hour:minute AM/PM" format in Middle East timezone
    $seatIdsParam = $_GET['seat_ids'];
    // Explode the string into an array of seat IDs
    $seatIdsArray = explode(',', $seatIdsParam);
    $seatCount = count($seatIdsArray); // Count the number of elements in the array
    $seatIdsString = implode(', ', $seatIdsArray);

    // Convert each seat ID to an integer
    foreach ($seatIdsArray as &$seatId) {
        $seatId = (int)$seatId;
}}
$currentDay = date("l"); 
$formatted_date = date('jS M', strtotime($_GET['date']));
?>

<?php
include('header.php');
?>

<div class="ticket created-by-anniedotexe">
    <div class="left">
        <div class="image">
            <p class="admit-one">
                <span>ADMIT ONE</span>
                <span>ADMIT ONE</span>
                <span>ADMIT ONE</span>
            </p>
            <div class="ticket-number">
                <img src="<?php echo $current_movie['poster']; ?>" alt="Movie Poster" class="image">
            </div>
        </div>
        <div class="ticket-info">
            <p class="date">

                <span> <?php echo $currentDay;?></span>
                <span class="june-29"><?php 
                    echo $formatted_date;?></span>
                <span>2024</span>
            </p>
            <div class="show-name">
                <h1><?php echo $current_movie['name']; ?></h1>
                <h2><?php echo $current_movie['language']; ?></h2>
            </div>
            <div class="time">
                <p><?php echo $_GET['time']; ?></p>
            </div>
            <p class="location">
                <span><?php echo $seatIdsString; ?></span>
                <span class="separator"><i class="far fa-smile"></i></span>
                <span></span>
            </p>
        </div>
    </div>
    <div class="right">
        <p class="admit-one">
            <span>ADMIT ONE</span>
            <span>ADMIT ONE</span>
            <span>ADMIT ONE</span>
        </p>
        <div class="right-info-container">
            <div class="show-name">
                <h1><?php echo $current_movie['name']; ?></h1>
            </div>
            <div class="time">
                <p><?php echo $_GET['time']; ?></p>
            </div>
            <div class="barcode">
                <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code">
            </div>
            <p class="ticket-number">
                #20030220
            </p>
        </div>
    </div>
</div>
<?php
if ($_GET['userid'] == null) {
    $message = "Please log in to book.";
} else {
    $show_id = $_GET['id'];
    $user_id = $_GET['userid'];
    $success = true; // Flag to track if any insertion fails
    
    foreach ($seatIdsArray as $seat_id) {
        // Insert each record with its respective seat ID
        $result = Savedata($show_id, $user_id, $seat_id);
        
        // Check if any insertion failed
        if (!$result) {
            $success = false;
            break; // No need to continue loop if any insertion fails
        }
    }
    
    // Set message based on success flag
    $message = $success ? "Your booking was successful" : "Try again";
}

?>
<div class="book-now-container">
<a href="index.php?userid=<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>" class="book-now" role="button" onclick="showPopup('<?php echo $message; ?>')"> Book now!</a>
</div>
<script>
function showPopup(message) {
    alert(message);
}
</script>
</body>

</html>