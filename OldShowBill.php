<!DOCTYPE html>

<html>

<head>
    <title> Bill </title>
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
}

}

         
    ?>
    
    
 <?php
      include('header.php');
    ?>
   
<body>

<style>
    .text-block2 img {
    position: absolute;
    top: 342px;
    left: 450px;
    width: 170px;
    height: auto;
    border-radius: 10px;
    background: #772C66;
}
.movie-poster {
    width: 500px; /* Set the width of the poster */
    height: 600x; /* Automatically adjust the height to maintain aspect ratio */
    border-radius: 10px; /* Add rounded corners */
    /* Set the position to absolute */
    top: 90%; /* Position the top edge slightly below the vertical center */
    left: 50%; /* Position the left edge at the horizontal center */
    transform: translate(-30%, -50%); /* Translate the image back by half of its own width and height */
}

.button {
  position: absolute; /* Set button position to absolute */
  bottom: 20px; /* Adjust vertical position from bottom */
  right: 20px; /* Adjust horizontal position from right */
  transform: translate(-70%, -50%);
}


</style>
        <div class="content-cont">
            <div class="container2" >
            
                <p id = "rcorners1"> </p>
                <!-- the image -->
                <div class="text-block2">
                <img src="<?php echo $current_movie['poster']; ?>" alt="Movie Poster" class="movie-poster">

                </div>
            
                <div class="text-block">
                    <div class="welcome-cont" >
                    <table class="wel-content">
                    
                    <tr>                                                
                          <td class="bil" ><p class="bill" style="font-size: 30px; "> Name:<?php echo" ". $current_movie['name'];?></p></td>                    
                    </tr>


                    <tr>
                        <td class="bil" ><p class="bill" style="font-size: 30px; ">Date: <?php echo $_GET['date']?></p></td>
                         <!-- the date of the movie will be retrieved from the DB -->
                        <td class="bil" ><p class="bill" style="font-size: 30px; "></p></td>
                    </tr>

                     <!-- row 3 -->
                     <tr>
                        <td class="bil"><p class="bill" style="font-size: 30px; ">Time: <?php echo $_GET['time'];?> </p></td>
                         <!-- the time of the movie will be retrieved from the DB -->
                        <td class="bil"><p class="bill" style="font-size: 30px; "> </p></td>
                     </tr>

                     <!-- row 4 -->
                     <tr>
                        <td class="bil"><p class="bill" style="font-size: 30px; ">Seats:<?php echo " $seatIdsString";?></p></td>
                         <!-- the seats of the movie will be retrieved from the DB -->
                        <td class="bil"><p class="bill" style="font-size: 30px; "></p></td>
                     </tr>

                    <tr>
                        <td class="bil"><p class="bill" style="font-size: 30px; ">Price:  <?php echo $current_movie['price']*$seatCount." SAR";?></p></td>
                         <!-- the price of the ticket will be retrieved from the DB -->
                        <td class="bil"><p class="bill" style="font-size: 30px; "> </p></td>
                    </tr>


                   
                    </table>

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

<a href="index.php?userid=<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>" class="book-now" role="button" onclick="showPopup('<?php echo $message; ?>')">book now!</a>

<script>
function showPopup(message) {
    alert(message);
}
</script>







        </div>
      <!-- </div> -->
    
    <!-- </div> -->
  </div>  
</div>  

</div>



</body> 

</html>