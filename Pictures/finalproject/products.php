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

    // Get the product type from the query string
    if (isset($_GET['type'])) {
        $productType = $_GET['type'];

        // Fetch products based on the product type
        $query = "SELECT * FROM products WHERE type_name = ?";
        $statement = $connx->prepare($query);
        $statement->execute([$productType]);

        // Process and display the fetched products
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    // Handle any errors that occur during the database operation
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="products.css">
    <title><?php echo $productType;?></title>
</head>
    <!-- <p>you are looking for <?php echo $productType;?></p> -->

<body>
    <?php
    if (isset($products) && count($products) > 0) {
        foreach ($products as $product) {
            // Display the product information using the card structure
            echo '<div class="card">';
            echo '<h3 class="Product-name">' . $product['product_name'] . '</h3>';
            echo '<img src="images/' . $product['product_image'] . '" alt="Product Image">';
            // echo '<p class="product-type">' . $product['type_name'] . '</p>';
            echo '<p class="card-price">'.$product['product_price'].' MAD</p>';
            // Additional product details can be added here
            echo '<a href="order.php?product_name=' . $product['product_name'] . '" class="card-btn">Order Now</a>';
            echo '</div>';
        }
    } else {
        echo "No products found for the selected type.";
    }
    ?>
</body>
</html>
