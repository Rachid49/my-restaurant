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

    // Fetch reservation from the database
    $stmt = $connx->query("SELECT * FROM reservation");
    
    $booking = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    
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
    <title>Admin Reservation</title>
</head>
<body>
    <h2>Admin Reservation</h2>
    <a href="admin_orders.php">Admin orders</a><br>
    <a href="Add_products.php">Add Products</a><br>
    <a href="?logout">logout</a>
    <table  width="100%">
        <tr bgcolor="lightgrey">
            <th>Reservation Number</th>
            <th>User Id</th>
            <th>UserName</th>
            <th>Number of person</th>
            <th>Reservation Date:</th>
            <th>Rate & time of comming</th>
        </tr>
        <?php foreach ($booking as $book) { ?>
            <tr align="center">
                <td><?php echo $book['reservation_number']; ?></td>
                <td><?php echo $book['user_id']; ?></td>
                <td><?php echo $book['username']; ?></td>
                <td><?php echo $book['Number_of_Person']; ?></td>
                <td><?php echo $book['reservation_date']; ?></td>
                <td><?php echo $book['date_time_comming']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
