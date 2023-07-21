
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>R & H Restaurant 🍽</title>
</head>
<body onload="slider()"> 
     <!-- ------------------NAV BAR SECTION -------------->
    <nav class="navbar">
        <div class="brand-title"><a href="#home-overlay">R & H 🍽</a></div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <li><a href="#home-overlay"> Home</a></li>
                    <li><a href="#special-dishes">MENU</a></li>
                    <li><a href="#services">Popular</a></li>
                    <li><a href="#Gallery">Gallery</a></li>
                    <li><a href="#about">About&#x23F7</a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="">Team</a></li>
                                <hr>
                                <li><a href="">Delivry</a></li>
                                <hr>
                                <li><a href="">Pricing</a></li>
                                <hr>
                                <li><a href="">Soldes</a></li>
                                <hr>
                                <li><a href="#contact">Contact</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
                
            </div>
            <img src="search.png" alt="" class="search-img">
            
            </div>
        </div>
        

    </nav>
   
<!-- ------------------HOME SECTION -------------->
<section class="home">
            
            <img src="images/bg.jpg" id="slatdeImg">

        <div id="home-overlay" class="home-overlay">
            <!-- SEARCH OVERLAY DIV BEGIN-->
        <div class="home-overlay-search">
            <form method="GET" action="search.php" class="search-form">
                
                    <input type="text" name="search" placeholder="Search by product name" class="search-input">
                    <button type="submit">Search</button>
                
            </form>
        </div>
         <!-- SEARCH OVERLAY DIV END-->
            <p class="hello">Come hungry, leave happy welcome to R & H Restaurant  
             <span id="logo"><span>Welcome to our Exceptional Restaurant: Where Flavors and Service Meet."
            to our restaurant, where we invite you to indulge in
            an exceptional dining experience 
            that combines exceptional
            flavors with impeccable service.
            </p>
            <img src="special-dishes/breakfast.jpg" class="phone-img">
            <a href="subscribe.php" target="_blank" id="subscribe">subscribe</a>
            <a href="booking.php" id="book-btn" target="_blank">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                book a table
            </a>
        </div>
        
</section>
<!-- ------------------SPECIAL DISHES SECTION -------------->
<section id="special-dishes" class="special-dishes">
    <h2>FOOD <span> MENU</span></h2>
    <div class="box-dishes-card">
    <a href="products.php?type=burger" target="_blank">
        <div id="dishes-card" class="LeftShow">
            <img src="special-dishes/burger.png" class="card-logo">
            <h3 class="dish-name">Tasty burguer</h3>
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet.
            </p>
            <img src="special-dishes/burger.jpg" class="dish-img">
        </div>
    </a>

    <a href="products.php?type=pizza" target="_blank">
        <div id="dishes-card" class="LeftShow">
            <img src="special-dishes/pizza.png" class="card-logo">
            <h3 class="dish-name" style="margin-left: 7%;">Tasty pizza</h3>
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet.
            </p>
            <img src="special-dishes/pizza.jpg" class="dish-img">
        </div>
    </a>

    <a href="products.php?type=ice cream" target="_blank">
        <div id="dishes-card" class="LeftShow">
            <img src="special-dishes/ice-cream-cup.png" class="card-logo">
            <h3 class="dish-name">Cold Ice-Cream</h3>
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet.
            </p>
            <img src="special-dishes/ice cream.jpg" class="dish-img">
        </div>
    </a>


    <a href="products.php?type=drinks" target="_blank">
        <div id="dishes-card" class="LeftShow">
            <img src="special-dishes/cold-drink.png" class="card-logo">
            <h3 class="dish-name" style="margin-left: 3%;">Cold Drinks</h3>
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet.
            </p>
            <img src="special-dishes/cold drinks.jpg" class="dish-img">
        </div>
    </a>


    <a href="products.php?type=cakes" target="_blank">
        <div id="dishes-card" class="LeftShow">
            <img src="special-dishes/cake-slice.png" class="card-logo">
            <h3 class="dish-name" style="margin-left: 6%;">Tasty Cakes</h3>
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet.
            </p>
            <img src="special-dishes/cakes.jpg" class="dish-img">
        </div>
    </a>


    <a href="products.php?type=breakfast" target="_blank">
        <div id="dishes-card" class="LeftShow">
            <img src="special-dishes/breakfast.png" class="card-logo">
            <h3 class="dish-name">Healty Breakfast</h3>
            <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                Lorem ipsum dolor sit amet.
            </p>
            <img src="special-dishes/breakfast.jpg" class="dish-img">
        </div>
    </a>
    </div>

</section>
<!-- ------------------SERVICES SECTION -------------->

 <section id="services" class="services">
    <h2>Most <span> popular</span> food</h2>
    <div class="box-card">

<!-- PHP code to display products -->
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

    // Step 2: Write query to fetch product information
    $query = "SELECT * FROM products LIMIT 12"; // Adjust the query as per your database structure and requirements

    // Step 3: Prepare and execute the query
    $stmt = $connx->prepare($query);
    $stmt->execute();

    // Step 4: Iterate over fetched products and display them
    while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $productName = $product['product_name'];
        $productImage = $product['product_image'];
        $productPrice = $product['product_price'];
        $productLink = "order.php?product_name=". urlencode($productName);

        // Construct the complete image source URL
        $imageSource = "images/" . $productImage;

        echo '<div id="card" class="LeftShow">';
        echo '<img src="' . $imageSource . '">';
        echo '<h3 class="Product-name">' . $productName . '</h3>';
        echo '<h4 class="card-price">' . $productPrice . ' MAD</h4>';
        echo '<a href="' . $productLink . '" target="_blank" class="card-btn">Order Now</a>';
        echo '</div>';
    }
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>

<!-- End of PHP code -->
 
    </div>
 </section>
<!-- ------------------HOW IT WORKS SECTION -------------->
<section class="steps">
    <h2>How it <sapn class="span">works</sapn></h2>
    <div class="box-steps">
        <div class="box">
            <img src="steps-img/choose.jpg">
            <h3>shoose your favorite food</h3>
        </div>

        <div class="box">
            <img src="steps-img/delivery.jpg">
            <h3>free and fast delivery </h3>
        </div>

        <div class="box">
            <img src="steps-img/payment.jpg">
            <h3>easy payments methods</h3>
        </div>

        <div class="box">
            <img src="steps-img/enjoy.png">
            <h3>And finaly, Enjoy your food</h3>
        </div>
    </div>
</section>

<!-- ------------------GALLERY SECTION -------------->
<!-- <section id="Gallery" class="gallery">
    <h2>Food <span>Gallery</span></h2>
    <div id="box-card">
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

            // Step 2: Write query to fetch product information
            $query = "SELECT * FROM products LIMIT 6"; // Adjust the query as per your database structure and requirements

            // Step 3: Prepare and execute the query
            $stmt = $connx->prepare($query);
            $stmt->execute();

            // Step 4: Iterate over fetched products and display them
            while ($product = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $productName = $product['product_name'];
                $productImage = $product['product_image'];
                $productPrice = $product['product_price'];
                $productLink = "order.php?product_name=" . urlencode($productName);

                // Construct the complete image source URL
                $imageSource = "images/" . $productImage;

                echo '<div id="gallery-card" class="LeftShow">';
                echo '<img src="' . $imageSource . '" alt="">';
                echo '<div id="overlay">';
                echo '<h4 class="price">' . $productPrice . ' MAD</h4>';
                echo '<h3 class="name">' . $productName . '</h3>';
                echo '<a class="btn" href="' . $productLink . '">Order Now</a>';
                echo '</div>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
        }
        ?>
    </div>
</section> -->




<section id="about" class="about">
    <h2>ABOUT <span>US</span></h2>
        <!-- <img src="sign bg image.jpg" id="slide-img"> -->
    <div id="about-txt" class="LeftShow">
        <p><span>Welcome to our Exceptional Restaurant: Where Flavors and Service Meet."
            </span> <br><br> to our restaurant, where we invite you to indulge in
            an exceptional dining experience that combines exceptional
            flavors with impeccable service. Our passion for cooking 
            and creating memorable culinary moments is evident in every
            dish that we serve. <br><br> We source only the finest ingredients and
            use creative techniques to craft dishes that are both delicious
             and visually stunning.
             <br><br>
             We source only the finest ingredients and
            use creative techniques to craft dishes that are both delicious
             and visually stunning.
        </p>
        <a href="" id="btn">learn more</a>
    </div>
    <div id="about-imgs" class="LeftShow">
        <img src="about-img/plate1.jpg">
        <img src="about-img/plate2.jpg">
        <img src="about-img/plate3.jpg">
        <img src="about-img/plate4.jpg">
    </div>
</section>

<!-- ------------------CONTACT SECTION -------------->
<section id="contact" class="contact">
    <h2>CONTACT <span>US</span> </h2>        
    <p id="text" class="LeftShow">contact us by sending an Email or a whatsapp message <span> 06 30 47 78 13</span> </p>

    <form class="LeftShow"> 
        <br><br>
        <input type="text" placeholder="Full Name" required>
        <br><br><br>
        <input type="email" placeholder="Email" required>
        <br><br><br>
        <textarea  placeholder="Message"></textarea>
        <br><br><br>
        <button type="button">Send Message</button>
    </form>
        <P id="iframeP" class="LeftShow"> were you can find us</P>
        <span id="address" class="LeftShow">9 rue el amal quartier miftah el khair safi</span>
        <iframe class="LeftShow" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3372.870569904462!2d-9.232938985348886!3d32.28845761604318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdac272b265bb075%3A0xb721a9e3716100a3!2sCentre%20de%20formation%20ville%20nouvelle!5e0!3m2!1sfr!2sma!4v1677682717320!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer"></iframe>
</section>

<!-- ------------------FOOTER SECTION -------------->
<footer class="footer">


    <div class="text">
        <h1 class="logo">R & H 🍽</h1>
        <p>Welcome to our Exceptional Restaurant: Where Flavors and Service Meet.
            to our restaurant, where we invite you to indulge in
            an exceptional dining experience that combines exceptional
            flavors with impeccable service.
            Our passion for cooking 
            and creating memorable culinary moments is evident in every
            dish that we serve. </p>
        <div class="cont-icon">
            <a href=""><img src="social media icons/facebook.png"></a>
            <a href=""><img src="social media icons/instagram.png"></a>
            <a href=""><img src="social media icons/youtube.png"></a>
            <a href=""><img src="social media icons/whatsapp.png"></a>
        </div>
    </div>
    <div class="product">
        <h2 class="head">Food </h2>       
        <h4><a href="">Moroccan</a></h4>
        <h4><a href="">Italian</a></h4>
        <h4><a href="">Chinese</a></h4>
        <h4><a href="">traditional</a></h4>
        <h4><a href="">Fast Food</a></h4>
    </div>

    <div class="links">
        <h2 class="head">Useful Links</h2>
        <h4><a href="">Blog</a></h4>
        <h4><a href="">Pricing</a></h4>
        <h4><a href="">Soldes</a></h4>
        <h4><a href="">Delevry</a></h4>
        <h4><a href="">Customer Servises</a></h4>
    </div>
    <div class="address">
        <h2 class="head">Address</h2>
        <p>consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore</p>
    </div>
    <p class="Copyright">Copyright 2023 - Developed By <a href=""> Rachid Habouli</a></p>
</footer>

<!-- LOADER -->
<!-- <div class="loader-container">
    <img src="pizza.png" alt="">
</div> -->

    <script src="script.js"></script>
</body>
</html>