<!DOCTYPE html>
<html lang="en">
<?php require_once('connect.php'); 
    session_start();
    $username = $_SESSION['username'];?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viwport" content="width=device-width, initial-scale=1.0">
    <title>Purchase History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="/css/phistory.css">
</head>
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
                <li><a href="homepage.php">Home</a></li>
                <li><a href="seller.php">Become Vendor</a></li>
                <li><a class="active" href="Phistory.php">history</a></li>
                <li><a href="upload.php">Add Product</a></li>
        </ul>
    </div>
<div class="list">
  <ul class="yeye">
    <li>order ID</li>
    <li>Store Name</li>
    <li>Product Name</li>
    <li>Status</li>
    <li>Pay Amount</li>

  </ul>
  <?php
    $sql1="select customerID From customer where username='$username';";
    $result1 = $mysqli->query($sql1);
    $row1 = $result1->fetch_array();
    $cid = $row1['customerID'];
    $sql2="select * from purchase_history where customerID = '$cid';";
    $result2 = $mysqli->query($sql2);
    $num_row = mysqli_num_rows($result2);
    if($num_row>0){
        for($i=0;$i<$num_row;$i++){
        $row2 = $result2->fetch_array();     
        $ID = $row2['OrderID1'];
        $storeName = $row2['store_name'];
        $pid = $row2['productID'];
        $paid =$row2['pay'];
        $sql3="select product_name from product where productID='$pid';";
        $result3 = $mysqli->query($sql3);
        $row3 = $result3->fetch_array();
        $productName = $row3['product_name'];
        
            echo"<ul class='riw'>
                <li data-label='OID'>$ID</li>
                <li data-label='sname'>$storeName</li>
                <li data-label='pname'>$productName</li>
                <li data-label='status'>Delivered</li>
                <li data-label='price'>$paid</li>
            </ul>";}}
    ?>
  
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
</body>
</html>