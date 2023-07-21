<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="search.css">
    <title>Search Products</title>
</head>
<body>



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

    // Step 1: Get the search term from the URL query parameter
    $searchTerm = $_GET['search'];

    // Step 2: Write query to fetch products matching the search term
    $query = "SELECT * FROM products WHERE product_name LIKE :searchTerm OR type_name LIKE :searchTerm";

    // Step 3: Prepare and execute the query
    $stmt = $connx->prepare($query);
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
    $stmt->execute();

    // Step 4: Check if any results were found
    if ($stmt->rowCount() > 0) {
        // Iterate over fetched products and display them
        while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productName = $product['product_name'];
            $productImage = $product['product_image'];
            $productPrice = $product['product_price'];
            $productLink = "order.php?product_name=" . urlencode($productName);

            // Construct the complete image source URL
            $imageSource = "images/" . $productImage;

            echo '<div class="card">';
            echo '<img src="' . $imageSource . '">';
            echo '<h3 class="Product-name">' . $productName . '</h3>';
            echo '<h4 class="card-price">' . $productPrice . ' MAD</h4>';
            echo '<a href="'. $productLink . '" target="_blank" class="card-btn">Order Now</a>';
            echo '</div>';
        }
    } else {
        echo 'No products found matching the search term.';
    }
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>

</body>
</html>
