<?php require_once('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viwport" content="width=device-width, initial-scale=1.0">
    <title>U-Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="/css/seller_decorate.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<?php
    session_start();
    $username = $_SESSION['username'];
    $_SESSION['username'] = $username;
    
?>
<body>
<?php
    function seller_regis($username,$storename,$phone,$email) {
        global $mysqli;
        $sql = "SELECT username FROM vendor WHERE username='$username';";
        $result = $mysqli->query($sql);
        $num_row = mysqli_num_rows($result);
        echo $num_row;
        if ($num_row>0) {
            echo "<script>alert('You are already a vendor');</script>";
        } else {
            
            $q1="INSERT INTO vendor (username,store_name,phone,email) 
            VALUES ('$username','$storename','$phone','$email')";
            $result=$mysqli->query($q1);
            $mysqli->close();
            header("Location: homepage.php");    
        }
    }

    if(isset($_POST['vendor_regis'])){
        $storename = $_POST["storename"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        seller_regis($username,$storename,$phone,$email);}
?>

<section id="header">
        <a href="homepage.html"><img src="Ushoplogo1.png" width="150" height="150" class="logo" alt=""></a>
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
                <li><a class="active" href="seller.php">Become Vendor</a></li>
                <li><a href="Phistory.php">history</a></li>
                <li><a href="upload.php">Add Product</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="forms-container">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="sign-up-ven">
                    <h2 class="title">Become a Seller</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Store Name" name="storename" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email"/>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" placeholder="Phone Number" name="phone"/>
                    </div>
                    <input type="submit" class="btn" value="Register" name='vendor_regis' />
                    </div>
                </form>
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
