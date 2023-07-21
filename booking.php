<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="booking.css">
    <title>Book A TABLE</title>
</head>
<body>
    <form method="POST" action="booking.php">
        <p id="welcom">welcome to R & H booking page</p>
        <p>please fill in this form to book a table in R & H restaurant!</p>
        
        <h2>Username:</h2>
        <input name="username" type="text" placeholder="Enter Your Username" id="input" required>
        <br><br>
        <h2>Number of Person:</h2>
        <input name="numberOfPerson" type="number" placeholder="Enter Number of Person"id="input" required>
        <br><br>
        <h2>date and time:</h2>
        <input name="date" type="datetime-local" id="input" required>
        <br>
        <p class="subscribe">if you didn't subscribed Yet click here:<a href="subscribe.php">Subscribe</a></p>
        <h4 id="suc">Your reservation has been submitted successfully!</h4>
        <h5 id="error">Sorry it seems that you Did not subscribed!</h5>
        <!-- <input type="reset"id="rest" value="Rest"> -->
        <br><br>
        <input type="submit" value="SUBMIT" id="submit" name="submit">
    </form>
</body>
</html>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&h restaurant";
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
);
try {
    $connx = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
    $connx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Handle booking form submission

    if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $numberOfPerson = $_POST['numberOfPerson'];
    $dateTimeComming = $_POST['date'];
    
    // Check if the user exists in the database
    
    	// Get the current date and time
    date_default_timezone_set("africa/Casablanca");
    $reservationDate = date("Y-m-d H:i");


    $stmt = $connx->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user) {
        // Your reservation processing logic goes here
        // GET USER ID
        $userId = $user['user_id'];
        // Insert the reservation into the reservation table
        $stmt = $connx->prepare("INSERT INTO reservation (user_id, username, Number_of_Person, reservation_date, date_time_comming) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $username, $numberOfPerson,$reservationDate, $dateTimeComming]);
       
        echo '<script>
        const suc = document.getElementById("suc");
            suc.style.display="block";
        </script>';

     

    $stmt = $connx->prepare("SELECT *  FROM reservation WHERE username = ?");
    $stmt->execute([$username]);
    $book = $stmt->fetch();



echo '<ul>';
    echo '<li>Reservation number: ' . $book['reservation_number'] . '</li>';
    echo '<li>UserName: ' . $username . '</li>';
    echo '<li> Number Of Person: ' . $numberOfPerson . '</li>';
    echo '<li> Reservation Date: ' . $reservationDate . '</li>';
    echo '<li> Date of comming: ' . $dateTimeComming . '</li>';
echo '</ul>';
    }

    else {
        // User doesn't exist, redirect to subscription page
        
            echo '<script>
                        const error = document.getElementById("error");
                        error.style.display="block";
                    </script>';
        exit;
    }
}
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>










