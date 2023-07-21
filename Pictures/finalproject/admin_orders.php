<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])|| $_SESSION['admin_logged_in'] !== true){
        header("location: admin_orders.php");
        exit();
    }
// LOG OUT
if (isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("location: login_admin.php");

}







$servername = "localhost";
$username = "root";
$password = "";
$dbname = "r&h restaurant";

try {
    $connx = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch orders from the database
    $stmt = $connx->query("SELECT * FROM orders");
    
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_orders.css">
    <title>Admin Orders</title>
</head>
<body>
    <h2>Admin Orders</h2>
    <a href="admin_reservation.php">Admin reservation</a><br>
    <a href="Add_products.php">Add Products</a><br>
    <a href="?logout">logout</a>
    <table  width="100%">
        <tr bgcolor="lightgrey">
            <th>Order Number</th>
            <th>User Id</th>
            <th>UserName</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Address</th>
            <th>Date</th>
        </tr>
        <?php foreach ($orders as $order) { ?>
            <tr align="center">
                <td><?php echo $order['order_number']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo $order['username']; ?></td>
                <td><?php echo $order['product_name']; ?></td>
                <td><?php echo $order['product_price']; ?> MAD</td>
                <td><?php echo $order['quantity']; ?></td>
                <td><?php echo $order['total_price']; ?> MAD</td>
                <td><?php echo $order['address']; ?></td>
                <td><?php echo $order['order_date']; ?></td>

            </tr>
        <?php } ?>
    </table>
</body>
</html>

