
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="subscribe.css">
    <title>subscribe</title>
</head>
<body>
    
    <br><br>
    <form method="POST" action="subscribe.php">
    <h3>please fill in this form to subscribe to R&H Restaurant</h3>

        <h2>full name:</h2>
        <input type="text" name="full_name" required placeholder="Enter your full name">
        <br>
        <h2>phone:</h2>
        <input type="text" name="phone" required placeholder="Enter your phone">
        <br>
        <h2>address:</h2>
        <input type="text" name="address" required placeholder="Enter your Address">
        <br>
        <h2>username:</h2>
        
        <input type="text" name="username" required placeholder="Choose a username and do not forget it">
        
        
        <h4 id="suc">You are Now subscribed to R&H Restaurant!</h4>
        <h5 id="error">Sorry! the username that you entred is already taken!</h5>
        <p class="backHome">Go to the home page <a href="home.php">Home</a></p>        <br><br>
        <input type="submit" value="subscribe" class="submit" name="submit">
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

        
        if (isset($_POST['submit'])){
            $fullName = $_POST['full_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $username = $_POST['username'];
        

        
            // CHECK USER 
            $stmt = $connx -> prepare("SELECT * FROM users WHERE username = ?");
            $stmt -> execute([$username]);
            $user = $stmt -> fetch();

            if($user){
                // user exist
                // echo '<h1>USER EXIST!</h1>';
                // echo '<script>alert("user exist");</script>';
                // echo '<script>alert("Sorry! the username that you entred is already taken");
                //         setTimeout(function(){window.location.href = "subscribe.php";},100);
                //     </script>';
                echo '<script>
                        const error = document.getElementById("error");
                        error.style.display="block";
                    </script>';
            } 
            else{
                // USER NOT EXIST
                // Insert new user into the database
            $stmt = $connx->prepare("INSERT INTO users ( full_name, phone, address,username) VALUES (:full_name, :phone, :address, :username)");
            $stmt->execute([
                'full_name' => $fullName, 
                'phone' => $phone, 
                'address' => $address,
                'username' => $username
            ]);
        
            // Redirect to login page after successful subscribe
            // header("Location: home.php");
            // exit;
            // echo '<script>alert("You are now subscribed to R&H Restaurant!");
            //             setTimeout(function(){window.location.href = "subscribe.php";},100);
            //         </script>';
                    echo '<script>
                    const suc = document.getElementById("suc");
                        suc.style.display="block";
                    </script>';
            }
            
            
            exit;
        }
}
    catch (PDOException $e) {
        // Handle any errors that occur during the database operation
        echo "Error: " . $e->getMessage();
    }

?>















