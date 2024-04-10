<?php require_once('connect.php'); ?>
<!DOCTYPE html>

<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="upload_decorate.css" />
  <title>upload</title>
 </head>
<body>
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
                <li><a href="seller.php">Become Vendor</a></li>
                <li><a href="Phistory.php">history</a></li>
                <li><a class="active" href="upload.php">Add Product</a></li>
        </ul>
    </div>

    <?php
    session_start();
    $username = $_SESSION['username'];
    

    function upload($username,$stock,$picture,$product_name,$detail,$price,$image_tmp_name, $image_folder) {
        global $mysqli;

        $sql = "SELECT vendorID FROM vendor WHERE username='$username';";
        $result = $mysqli->query($sql);
        $row = $result->fetch_array();
        $vendorID = $row['vendorID'];
        $sql2 = "INSERT INTO product (vendorID,stock,picture,product_name,detail,price) 
        VALUES ('$vendorID','$stock','$picture','$product_name','$detail','$price')";
        $result2 = $mysqli->query($sql2);
        ##move_uploaded_file($image_tmp_name, $image_folder);##

    }

    if(isset($_POST['submit'])){
        $sql1 = "SELECT vendorID FROM vendor WHERE username='$username';";
        $result1 = $mysqli->query($sql1);
        if(mysqli_num_rows($result1)>0){
            $image = $_FILES['product_image']['name'];
            $image = filter_var($image, FILTER_SANITIZE_STRING);
            $image_size = $_FILES['product_image']['size'];
            $image_tmp_name = $_FILES['product_image']['tmp_name'];
            $image_folder = '../img2/'.$image;
            $stock = $_POST['stock'];
            $picture = $image;
            $product_name = $_POST['product_name'];
            $detail = $_POST['detail'];
            $price = $_POST['product_price'];
        
            upload($username,$stock,$picture,$product_name,$detail,$price,$image_tmp_name, $image_folder);

            ##header("Location: homepage.php");
        }
        else{
            echo "<script>alert('please become a vendor first');</script>";
        }
        
    }
    ?>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="<?= $_SERVER['PHP_SELF']; ?>" class="sign-up-form" method="post" enctype="multipart/form-data">
                    <h2 class="title">Add the product</h2>
                    <div class="input-field">
                        <i class="fa-solid fa-signature"></i>
                        <input type="text" required placeholder="Enter product name" name="product_name" maxlength="155" class="Box">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                        <input type="number" min="0" max="9999999" required placeholder="Enter product price" name="product_price" class="box">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        <input type="number" min="0" max="9999999" required placeholder="Enter product stock" name="stock" class="box">
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-image"></i>
                        <input type="file" name="product_image" class="box" accept="image/jpg, image/jpeg, img/png, img/webp" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-circle-info"></i>
                        <textarea style="font-family: 'Courier New'; font-size: 20px;" type="details" class="box" placeholder="Enter product details" required maxlength="500" cols="30" rows="10" name="detail"></textarea>
                    </div>

                    <input type="submit" class="btn" value="submit" name="submit" />
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