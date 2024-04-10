<?php 
require_once('connect.php'); 
session_start();
$username = $_SESSION['username'];
$totalpay = $_SESSION['amount'];
$pid = $_SESSION['pid'];
?>

<!DOCTYPE html>
<?php
    function insertMbank($customerID,$bankname,$accountNo) {
        global $mysqli;
        $sql = "SELECT account_no from mobile_bank where customerID='$customerID';";
        $result = $mysqli->query($sql);
        $sql2 ="INSERT INTO mobile_bank(customerID,bankname,account_no)
        VALUE('$customerID','$bankname','$accountNo');";
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
        $q1 = "SELECT customerID from customer where username='$username';";
        $result1 = $mysqli->query($q1);
        $row1 = $result1->fetch_array();
        $customerID = (int)$row1['customerID'];
        $bankname = $_POST['bankname'];
        $accountNo = $_POST['banknumber'];
        $productID = (int)$pid[0];
        $pay = $totalpay;
        $q3 = "SELECT store_name from vendor where vendorID = (SELECT vendorID from  product where productID ='$productID');";
        $result3 = $mysqli->query($q3);
        $row3 = $result3->fetch_array();
        $storeName = $row3['store_name'];
        insertMbank($customerID,$bankname,$accountNo);
        insertHistory($storeName,$customerID,$productID,$pay);
        insertOrder($pay,$customerID,$productID);
        $_SESSION['pid']=array();
        header("Location: homepage.php");
    }?>
<html>
<title>UShop Mobile Banking Payment Page | Easy market website</title>
<head>
    <link rel="stylesheet" href="/css/mobile_decorate.css">
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
        <label class="cardpayment">Mobile Banking Payment</label>
    </section>

    <section id="middle">
        <ul id="left-middle">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="sign-in-form">
            <li style="list-style-type: none;">Bank name: </li>
            <div class="input-field">
            <i class="fa-solid fa-signature"></i>
            <input type="text" placeholder="Enter Bank name" name="bankname" required><br>
            </div>

            <li style="list-style-type: none;">Bank account number: </li>
            <div class="input-field">
            <i class="fa-sharp fa-solid fa-credit-card"></i>
            <input type="text" placeholder="Enter Bank account number" name="banknumber" required><br>
            </div>
            
            <br><li style="list-style-type: none;">Price : <?php echo "$totalpay"?> THB</li> 

        </ul>
    </section>

    <section id="bottom">
    <button class="btn" name="pay" type="submit" onClick="location.href='homepage.php'">Pay</button></a>
    
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