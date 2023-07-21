




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order.css">
    <title>Order</title>
</head>
    
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

    // Handle order form submission
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $Address = $_POST['Address'];
        $productName = $_POST['product_name'];
        $quantity = $_POST['quantity'];

       
	// Get the current date and time
        date_default_timezone_set("africa/Casablanca");
        $orderDate = date("Y-m-d H:i");
        
        // Check if the user exists in the database
        $stmt = $connx->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            // Your order processing logic goes here
        
            // GET USER ID
            $userId = $user['user_id'];

            // Fetch the product price from the database
            $stmt = $connx->prepare("SELECT product_price FROM products WHERE product_name = ?");
            $stmt->execute([$productName]);
            $productPrice = $stmt->fetchColumn();


     

            if ($productPrice) {
                // Calculate the total price based on quantity
                $totalPrice = $productPrice * $quantity;

                // Insert the order into the orders table
                $stmt = $connx->prepare("INSERT INTO orders (user_id, username,  product_name, product_price, quantity, total_price, address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $userId, 
                    $username, 
                    $productName, 
                    $productPrice, 
                    $quantity, 
                    $totalPrice, 
                    $Address,
                    $orderDate
                    
                ]);


                // echo '<script>alert("Your Order has been submitted successfully!");
                // </script>';



echo '<ul>';
echo '<li>UserName: ' . $username . '</li>';
echo '<li> Product Name: ' . $productName . '</li>';
echo '<li> Product Price: ' . $productPrice . '</li>';
echo '<li> Quantity: ' . $quantity . '</li>';
echo '<li> Total Price: ' . $totalPrice . '</li>';
echo '<li> Delevred To: ' . $Address . '</li>';
echo '<li> Order Date: ' . $orderDate . '</li>';
echo '</ul>';




                
                echo '<script>
                    document.write(`<p id="suc">Your Order has been submitted successfully!</p>`);
                </script>';
            } else {
                // Product not found, display error message
                echo '<script>alert("Invalid product name!");
                    setTimeout(function(){window.location.href = "order.php";},100);
                </script>';
                exit;
            }
        } else {
            // User doesn't exist, redirect to subscription page
            // echo '<script>alert("Sorry, it seems that you have not subscribed yet!");
            //     setTimeout(function(){window.location.href = "subscribe.php";},100);
            // </script>';
            echo '<script>
                    document.write(`<p id="error">Sorry, it seems that you did not subscribed yet!</p>`);
                </script>';
            
        }
    } else {
        // Check if the product name is provided in the URL
        if (isset($_GET['product_name'])) {
            $productName = $_GET['product_name'];

            // Fetch the product price from the database
            $stmt = $connx->prepare("SELECT product_price FROM products WHERE product_name = ?");
            $stmt->execute([$productName]);
            $productPrice = $stmt->fetchColumn();
        }
    }



} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
    <script>
        function updateTotalPrice() {
            var quantity = document.getElementById('quantity').value;
            var productPrice = document.getElementById('product_price').value;
            var totalPrice = quantity * productPrice;
            document.getElementById('total_price').value = totalPrice.toFixed(2);
        }
    </script>

<body>
    <form method="POST" action="">
        <h3>Please fill in this form to submit your order</h3>

        <h2>Username:</h2>
        <input type="text" name="username" required placeholder="Enter your username"><br>

        <h2>Address:</h2>
        <input type="text" name="Address" required placeholder="Enter your Address"><br>

        <h2>Product Name:</h2>
        <input type="text" name="product_name" value="<?php echo isset($_GET['product_name']) ? $_GET['product_name'] : ''; ?>" required placeholder="Your product name goes here"><br>

        <h2>Product Price:</h2>
        <input type="text" id="product_price" name="product_price" value="<?php echo isset($productPrice) ? $productPrice : ''; ?>" readonly><br>

        <h2>Quantity:</h2>
        <input type="number" id="quantity" name="quantity" required placeholder="Enter the quantity" onchange="updateTotalPrice()"><br>

        <h2>Total Price:</h2>
        <input type="text" id="total_price" name="total_price" value="" readonly><br>
        <!-- <h4 id="suc">Your Order has been submitted successfully!</h4> -->
        <!-- <h5 id="error">Sorry, it seems that you have not subscribed yet!</h5> -->
        <input type="submit" name="submit" value="Place Order" class="submit">
        <p>You haven't subscribed yet? <a href="subscribe.php">Subscribe</a></p>
        <p class="backHome">Back to the home page <a href="home.php">Home</a></p>
    </form>

   
</body>
</html>









