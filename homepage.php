<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>

    <title>U-Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="/css/homepage_decorate.css">
</head>
<?php 
    session_start();
    $username = $_SESSION['username'];
    
    
    $cart = $_SESSION['cart'];

    
    if (!empty($_POST['addcart'])) {
        $pid = $_POST['addcart'];
        
        array_push($_SESSION['cart'],$pid);   
    }
?>
<body>
    
        <section id="header">
            <a href="#"><img src="Ushoplogo1.png" width="150" height="150" class="logo" alt=""></a>
            <div class="nav-item">
                <div class="search">
                    <input type="text" class="search-box" placeholder="product"></li>
                    <button class="search-btn">Search</button>
                </div>
                <div class="navv">
                    <a href="Profile.html"><i class="fa-solid fa-user"></i></a>
                    <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>
            </div>

        </section>
        <div>
            <ul id="navbar">
                <li><a class="active" href="homepage.php">Home</a></li>
                <li><a href="seller.php">Become Vendor</a></li>
                <li><a href="Phistory.php">history</a></li>
                <li><a href="upload.php">Add Product</a></li>
            </ul>
        </div>
 

    <section id="hero">
        <h2>11.11 BIG SALE</h2>
        <h1>TAKE 15%* off!</h1>
        <p>Use coupon code RIWZALNW001</p>
        <button>Shop Now</button>

    </section>

    <section class="product">
        <h2 class="product-category">11.BIG SALE</h2>
        <button class="pre-btn"><img src="img2/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img2/arrow.png" alt=""></button>
        <div class="product-container">
        <?php
            $sql1 = "SELECT count(productID) FROM `product`;";
            $result = $mysqli->query($sql1);
            $row1 = $result->fetch_array();
            $items = $row1['count(productID)'];

            for($x = 1; $x <= $items and $x<=8; $x++){
            $sql2 = "SELECT * FROM `product` WHERE productID = $x;";
            $result2 = $mysqli->query($sql2);
            $row2 = $result2->fetch_array(); 
            $image = $row2['picture'];
            $pid=$row2['productID'];
            $product_name=$row2['product_name'];
            $detail=$row2['detail'];
            $price=$row2['price'];
            $discount=$price/2;
            echo"<div class='product-card'>";
            echo "<div class='product-image'>";
                echo "<span class='discount-tag'>50% off</span>";
                echo "<img src='img2/$image' class='product-thumb' alt=''>";
                
                echo "<form action='' method='post'>";
                echo "<button class='card-btn' type='submit' value =".$x." name='addcart'>add to cart</button>";
                echo "</form>";
                
                echo "</div>";
                echo "<div class='product-info'>";
                    echo "<h2 class='product-brand'>$product_name</h2->";
                    echo "<p class='product-des'>$detail</p>";
                    echo"<span class='price'>฿$price</span>";
                echo "</div>";
            echo "</div>";}?>
            
    </section>

    <section class="product">
    <h2 class="product-category">11.BIG SALE</h2>
        <button class="pre-btn"><img src="img2/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img2/arrow.png" alt=""></button>
        <div class="product-container">
        <?php
            if($items>8){
                $y=9;
                $z=16;
            }
            else{$y=1;$z=8;}

            for($x = $y; $x <= $items and $x<=$z; $x++){
            
            $sql2 = "SELECT * FROM `product` WHERE productID = $x;";
            $result2 = $mysqli->query($sql2);
            $row2 = $result2->fetch_array(); 
            $image = $row2['picture'];
            $product_name=$row2['product_name'];
            $detail=$row2['detail'];
            $price=$row2['price'];
            $discount=$price/2;
            echo"<div class='product-card'>";
            echo "<div class='product-image'>";
                echo "<span class='discount-tag'>50% off</span>";
                echo "<img src='img2/$image' class='product-thumb' alt=''>";
                echo "<button class='card-btn'>add to wishlist</button>";
                echo "</div>";
                echo "<div class='product-info'>";
                    echo "<h2 class='product-brand'>$product_name</h2>";
                    echo "<p class='product-des'>$detail</p>";
                    echo"<span class='price'>฿$price</span>";
                echo "</div>";
            echo "</div>";}?>
    </section>

    <section class="product">
        <h2 class="product-category">New Listing</h2>
        <button class="pre-btn"><img src="img2/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img2/arrow.png" alt=""></button>
        <div class="product-container">
        <?php
            if($items>16){
                $y=16;
                $z=24;
            }
            else{$y=1;$z=8;}

            for($x = $y; $x <= $items and $x<=$z; $x++){
            
            $sql2 = "SELECT * FROM `product` WHERE productID = $x;";
            $result2 = $mysqli->query($sql2);
            $row2 = $result2->fetch_array(); 
            $image = $row2['picture'];
            $product_name=$row2['product_name'];
            $detail=$row2['detail'];
            $price=$row2['price'];
            $discount=$price/2;
            echo"<div class='product-card'>";
            echo "<div class='product-image'>";
                echo "<span class='discount-tag'>50% off</span>";
                echo "<img src='img2/$image' class='product-thumb' alt=''>";
                echo "<button class='card-btn'>add to wishlist</button>";
                echo "</div>";
                echo "<div class='product-info'>";
                    echo "<h2 class='product-brand'>$product_name</h2>";
                    echo "<p class='product-des'>$detail</p>";
                    echo"<span class='price'>฿$price</span>";
                echo "</div>";
            echo "</div>";}?>
    </section>

    <footer>
        <div class="footer-content">
            <img src="Ushoplogo1.png" class="logo" alt="">
            <div class="footer-ul-container">
                <ul class="category">
                    <li class="category-title">heading</li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                </ul>
                <ul class="category">
                    <li class="category-title">heading</li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                    <li><a href="#" class="footer-link">Product</a></li>
                </ul>
            </div>
        </div>
        <p class="footer-title">about</p>
        <p class="info">This is the description of something we also do not know about. 
            We do not know what we are doing but we comple the page. Good Luck have fun. 
            BYEBYE :) This is the description of something we also do not know about.
            We do not know what we are doing but we comple the page. Good Luck have fun. 
            BYEBYE :) This is the description of something we also do not know about.
            We do not know what we are doing but we comple the page. Good Luck have fun. 
            BYEBYE :) This is the description of something we also do not know about.
            We do not know what we are doing but we comple the page. Good Luck have fun.
            BYEBYE :</p>
            <p class="info">support emails - riwkiwzalnw001@gmail.com, framet007@gmail.com</p>
            <p class="info"> telephone - 081 000 0000, 082 000 0000
            </p>
    </footer>

    <script src="home.js"></script>
</body>

</html>