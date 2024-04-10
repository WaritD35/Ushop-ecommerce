<?php require_once('connect.php');
session_start();

$cart = $_SESSION['cart'];

$pid = $_SESSION['pid'];


?>

<!DOCTYPE html>

<html>
<title>UShop Cart Page | Easy market website</title>
<head>
    
    <link rel="stylesheet" href="/css/cart_decorate1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
    <section id="header">
        <a href="homepage.php"><img src="Ushoplogo1.png" width="150" height="150" class="logo" alt=""></a>
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
            <li><a href="homepage.php">Home</a></li>
            <li><a href="seller.php">Become Vendor</a></li>
            <li><a href="Phistory.php">history</a></li>
            <li><a href="upload.php">Add Product</a></li>
        </ul>
    </div>

    <div id="middle">

        <div id="left-middle">
            <ul id="product-list">
            <div id="product_box">
            <?php
                $cart = $_SESSION['cart'];
                $total_amount = 0;
                
                for($i=0; $i<count($cart);$i++){
                    $sql2 = "SELECT * FROM product WHERE productID = $cart[$i];";
                    $result2 = $mysqli->query($sql2);
                    $row2 = $result2->fetch_array(); 
                    
                    $pro=$row2['productID'];
                    $product_name=$row2['product_name'];
                    $stock = $row2['stock'];
                    $price=$row2['price'];
                    $total_amount += $price;
                    
                    array_push($_SESSION['pid'],$pro);
                    
                    echo "<label style='line-height:30px;'>Product name: $product_name</label><br>";
                    echo"<label style='line-height:30px;'>Quantity: 1 </label><br>";
                    echo"<label style='line-height:30px;'>Price: $price </label><br>";
                    echo "<hr>";
                $_SESSION['amount'] = $total_amount;
                }
            ?>
            </ul>
        </div>

        <div id="right-middle">
                <?php 
                $username = $_SESSION['username'];
                
                $sqlsent = "SELECT * FROM users WHERE username='$username' ;";
                $result3 = $mysqli->query($sqlsent);
                $row3 = $result3->fetch_array(); 
                
                $address=$row3['Address'];
                $phone=$row3['phone'];
                
                ?>
            <div class="input-field"><i class="fas fa-user"></i><input style="font-size: 20px" type="text" name="name" placeholder="Enter recipient's name" required><br></div><br>
            Address: <?php echo "$address"?><br><hr style="width:40%"><br>
            Phone number: <?php echo "$phone"?> <br><hr style="width:40%"><br>
            Total price:  <?php echo "$total_amount"?> THB <hr style="width:40%"><br><br>
            <a href="card_payment.php"><button class="button1" method='post' name="submit">Pay with Credit Card</button></a>
            <a href="mobile_payment.php"><button class="button1" method='post' name="submit">Pay with Mobile Banking</button></a><br>
        </div>
    </div>



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
            We do not know what we are doing but we complete the page. Good Luck have fun. 
            BYEBYE :) This is the description of something we also do not know about.
            We do not know what we are doing but we complete the page. Good Luck have fun. 
            BYEBYE :) This is the description of something we also do not know about.
            We do not know what we are doing but we complete the page. Good Luck have fun. 
            BYEBYE :) This is the description of something we also do not know about.
            We do not know what we are doing but we complete the page. Good Luck have fun.
            BYEBYE :</p>
            <p class="info">support emails - riwkiwzalnw001@gmail.com, framet007@gmail.com</p>
            <p class="info"> telephone - 081 000 0000, 082 000 0000
            </p>
    </footer>


   
</body>
</html>