<?php require_once('connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="/css/loginstyle.css" />
  <title>Login-Register</title>
 </head>

 <body>
    <?php
    session_start();
    $_SESSION['cart']=array();
    $_SESSION['pid']=array();

    function auth($username, $password) {
        global $mysqli;
        
        $sql = "SELECT passwd FROM users WHERE username='$username';";
        $result = $mysqli->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_array();
            $hash = $row['passwd'];
            if (password_verify($password, $hash)) {
                $_SESSION['username'] = $username;
                header("Location: homepage.php");
            } else {
               
                echo "<script>alert('Wrong pasword');</script>";
                
            }
        } 
        else {       
            echo "<script>alert('Wrong username or password');</script>";
        }
    }

    if(isset($_POST['login'])){
        $username = $_POST["username"];
        $raw_passwd = $_POST['password'];
        auth($username,$raw_passwd);}
?>

<?php
    function register($username,$passwd,$birthdate,$phonenumber,$sex,$address,$citizenID,$email) {
        global $mysqli;

        $q1="INSERT INTO users (username,passwd,DoB,phone,gender,Address,citizenID,email) 
        VALUES ('$username','$passwd','$birthdate','$phonenumber','$sex','$address','$citizenID','$email')";
        $result=$mysqli->query($q1);
        $q2="INSERT INTO customer (username)
        VALUES ('$username')";
        if ($mysqli -> error){
            echo "<script>alert('ERROR!!! Please try again');</script>";        
        }
        $result2=$mysqli->query($q2);
        if(!$result and !$result2){
            echo "<script>alert('ERROR!!! Please try again');</script>";
            return false;
            }
        $mysqli->close();
        header("Location: loginnew.php");
    
    }

    if(isset($_POST['register'])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $citizenID = $_POST["citizenID"];
        $sex = $_POST["gender"];
        $phonenumber = $_POST["phonenumber"];
        $birthdate = $_POST["birthdate"];
        $address = $_POST["address"];
        $raw_passwd     = $_POST['passwd'];
        $passwd    = password_hash($raw_passwd, PASSWORD_DEFAULT);
        register($username,$passwd,$birthdate,$phonenumber,$sex,$address,$citizenID,$email);}

?>

 <body>
    
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name = "username"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" />
                    </div>
                    <input class="btn solid" type="submit" value="Login" name="login" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                         <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-square-instagram"></i>
                        </a>
                    </div>
                </form>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post" class="sign-up-form">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="passwd"/>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email"/>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-id-card"></i>
                        <input type="CID" placeholder="Citizen ID" name="citizenID"/>
                    </div>
                    
                    <div class="input-field">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" placeholder="Phone Number" name="phonenumber" />
                    </div>
                    <div class="input-field">   
                        <i class="fa-solid fa-cake-candles"></i>
                        <input type="date" placeholder="Date of Birth" name="birthdate" />
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" placeholder="Address" name="address"/>
                    </div>
                    <div class="gender-details">
                        <input type="radio" name="gender" id="dot-1" value="m">
                        <input type="radio" name="gender" id="dot-2" value="f">
                        <input type="radio" name="gender" id="dot-3" value="na">
                        <span class="gender-title">Gender</span>
                        <div class="category">
                          <label for="dot-1">
                          <span class="dot one"></span>
                          <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                          <span class="dot two"></span>
                          <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                          <span class="dot three"></span>
                          <span class="gender">Other</span>
                          </label>
                        </div>
                      </div>

                    <input type="submit" class="btn" value="Sign up" name = "register" />
                    
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fa-brands fa-square-instagram"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                    What am i doing, why am i coding. I could have a lovely sleep.
                    <button class="btn transparent" id="sign-up-btn">Register</button>
                </div>
                <img src="img/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                    What am i doing, why am i coding. I could have a lovely sleep.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="img/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>
<script src="app.js"></script>
</body>
</html>
