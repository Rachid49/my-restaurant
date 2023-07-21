<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])|| $_SESSION['admin_logged_in'] !== true){
        header("location: Add_products.php");
        exit();
    }
// LOG OUT
if (isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location: login_admin.php");

}
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Add_products.css">
    <title>Add Product</title>
</head>
<body>
    <a href="admin_orders.php">Admin orders</a><br>
    <a href="admin_reservation.php">Admin reservation</a><br>
    <a href="?logout">logout</a>
    <form method="POST" action="Add_products.php">
    
    <h3>Fill in this form to Add a Product</h3>
        <h2>Product Name:</h2>
        <input type="text" name="name" required placeholder="Enter the product name">
        <br><br>
        <h2>Product Image:</h2>
        <input type="file" name="image" required class="img-input" >
        <br><br>
        <h2>Product Price:</h2>
        <input type="number" step="0.0" name="price" required placeholder="Enter the product price">
        <br><br>
        <h2>Product Type:</h2>
        <input type="text" name="type" required placeholder="Enter the product type">
        <br><br>
        <h4 id="suc">1 Product added successfully!</h4>
        <h5 id="error">Error: Product already exists in the database!</h5>
        <input type="submit" value="Add Product" class="submit" name="submit">
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

    if (isset($_POST['submit'])) {
        $productName = $_POST['name'];
        $productImage = $_POST['image'];
        $productPrice = $_POST['price'];
        $productType = $_POST['type'];

        // Check if the product already exists
        $stmt = $connx->prepare("SELECT * FROM products WHERE product_name = ?");
        $stmt->execute([$productName]);
        $existingProduct = $stmt->fetch();

        if ($existingProduct) {
            // Product already exists, display an error message
            // echo '<script>alert("Product already exists in the database!");</script>';
            echo '<script>
                        const error = document.getElementById("error");
                        error.style.display="block";
                    </script>';
        } else {
            // Insert the product into the products table
            $stmt = $connx->prepare("INSERT INTO products (product_name, product_image, product_price, type_name) VALUES (?, ?, ?, ?)");
            $stmt->execute([$productName, $productImage, $productPrice, $productType]);

            // echo '<script>alert("Product added successfully!");
            //      setTimeout(function(){window.location.href = "Add_products.php";},100);
            // </script>';
            echo '<script>
            const suc = document.getElementById("suc");
                suc.style.display="block";
            </script>';
        }
    }
} catch (PDOException $e) {
    // Handle any errors that occur during the database operation
    $message = "Error: " . $e->getMessage();
}
?>




