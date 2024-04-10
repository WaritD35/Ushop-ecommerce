<?php require_once('connect.php'); 
    session_start();
    $username = $_SESSION['username'];
    $cart = $_SESSION['cart'];
    $totalpay = $_SESSION['amount'];
    $pid = $_SESSION['pid'];
    
    ?>

<!DOCTYPE html>
<?php
    function insertCard($cardNo,$customerID,$exp,$holder_name,$cvc) {
        global $mysqli;
        $sql2 ="INSERT INTO credit_card(cardNo,customerID,exp,holder_name,cvv_cvc)
                VALUE('$cardNo','$customerID','$exp','$holder_name','$cvc');";
        $result2 = $mysqli->query($sql2);
    }
    function insertOrder($pay,$customerID,$productID) {
        global $mysqli;
        $sql3 ="INSERT INTO orders(pay,customerID,productID,payment_method)
                VALUE('$pay','$customerID','$productID','credit card');";
        $result3 = $mysqli->query($sql3);
    }
    function insertHistory($storeName,$customerID,$productID,$pay) {
        global $mysqli;
        $sql4 ="INSERT INTO purchase_history(store_name,customerID,productID,pay)
                VALUE('$storeName','$customerID','$productID','$pay');";
        $result4 = $mysqli->query($sql4);
    }

    if(isset($_POST['pay'])){
        $cardNo = $_POST['cardnumber'];
        $q1 = "SELECT customerID from customer where username='$username';";
        $result1 = $mysqli->query($q1);
        $row1 = $result1->fetch_array();
        $customerID = (int)$row1['customerID'];
        $month = $_POST['exp_m'];
        $int_month = (int)$month; 
        $year = $_POST['exp_y'];
        $int_year = (int)$year;
        $exp = "$year-$month-1";
        $holder_name = $_POST['holdername'];
        $cvc = $_POST['cvc'];
        $productID = (int)$pid[0];
        $pay = $totalpay;
        $q3 = "SELECT store_name from vendor where vendorID = (SELECT vendorID from  product where productID ='$productID');";
        $result3 = $mysqli->query($q3);
        $row3 = $result3->fetch_array();
        $storeName = $row3['store_name'];
        insertCard($cardNo,$customerID,$exp,$holder_name,$cvc);
        insertHistory($storeName,$customerID,$productID,$pay);
        insertOrder($pay,$customerID,$productID);
        $_SESSION['pid']=array();
        header("Location: homepage.php");
    }
?>
<html>
<title>UShop Card Payment Page | Easy market website</title>
<head>
    <link rel="stylesheet" href="/css/card_decorate.css">
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

    <section id="sub-header">
        <label class="cardpayment">Credit/Debit Card Payment</label>
    </section>

    <section id="middle">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="sign-in-form">
        <ul id="left-middle">

        <li style="list-style-type: none;">Holder name : </li>
            <div class="input-field">
            <i class="fa-solid fa-signature"></i>
            <input type="text" placeholder="Enter card's holder name" name="holdername" required><br>
            </div>

            <li style="list-style-type: none;">Card number : </li>
            <div class="input-field">
            <i class="fa-sharp fa-solid fa-credit-card"></i>
            <input type="text" placeholder="Enter card number" name="cardnumber" required><br>
            </div>

            <li style="list-style-type: none;">Expired date : </li>
            <div class="input-field">
            <i class="fa-solid fa-calendar-days"></i>
            <input type="text" placeholder="month" name="exp_m" required>
            </div>
            <div class="input-field">
            <i class="fa-solid fa-calendar-days"></i>
            <input type="text" placeholder="year" name="exp_y" required><br>
            </div>

            <li style="list-style-type: none;">CVC : </li>
            <div class="input-field">
            <i class="fa-solid fa-hashtag"></i>
            <input type="text" placeholder="Enter CVC number" name="cvc" required><br>
            </div>
            
            <br><li style="list-style-type: none;">Price : <?php echo "$totalpay"?> Baht</li> <!-- Total Price of an order-->

        </ul>
    </section>
    
    <section id="bottom">
        <button class="btn" name="pay" type="submit">Pay</button></a>
    </section>
</form>
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