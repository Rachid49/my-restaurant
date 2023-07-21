

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_admin.css">
    <title>Admin Login</title>
</head>
<body>
    
    <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>


    <div class="login-box">
  <h2>Admin Login</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="user-box">
      <input type="email" name="email" required>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required>
      <label>Password</label>
    </div>
    <h5 id="error">Invalid email or password.</h5>
    <input type="submit" class="submit" name="submit" value="Login">
  </form>
</div>
</body>
</html>






<?php
// Check if the user is already logged in and redirect to admin_orders.php

session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Establish a database connection (replace with your own connection details)
    $host = 'localhost';
    $dbname = 'r&h restaurant';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = $_POST['email'];
        $password = $_POST['password'];

        // Prepare and execute a query to fetch the admin record based on email
        $stmt = $db->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->execute([$email]);

        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if ($admin && password_verify($password, $admin['password'])) {
            // Password is correct, set cookie and redirect to admin_orders.php
            $_SESSION['admin_logged_in'] = true; 
            header("Location: admin_orders.php");
            exit();
        } else {
            // Invalid email or password, display error message
            // $error = "Invalid email or password.";
            echo '<script>
            const error = document.getElementById("error");
            error.style.display="block";
        </script>';
        }
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }
}
?>