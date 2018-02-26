<?php
//Starts a PHP session to be used on multiple pages, accesd with $_SESSION variable
session_start();

//Shows errors on the page
error_reporting(E_ALL);
ini_set('display_errors', '1');

//Defining the salting encryption standard
define("SALT", 'ASDGasdfvartWFGSD#$5t2345HFDSY45yw4rget4312');
$output = "";

//Executes if statement if the user has entered a email and password
if (isset($_POST['email']) && $_POST['pass'] != null) {
    //Creates a PDO database object that has the credentials of the database login
    $db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Queries the database for some info, in this case, all of the columns. This is not important right now, will change later on when known columns are needed
    $qr = $db->prepare("SELECT * FROM Customer WHERE email = ?");
    $qr->execute(array($_POST['email']));

    //Returns true if the user is found in the database
    if ($userDetails = $qr->fetch(PDO::FETCH_ASSOC)) {
        //Compares the password input by the user and the one stored in the database. Both passwords are salted so the actual password will never be known by anyone except the user who created it
        if (hash_equals($userDetails['passwordHash'], crypt($_POST['pass'], SALT))) {
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            header('Location: https://' . $_SERVER['HTTP_HOST'] . $uri . '/profile.php');
            $_SESSION["userEmail"] = $userDetails['email'];
            $_SESSION["userfName"] = $userDetails['fName'];
            $_SESSION["userlName"] = $userDetails['lName'];
            //$_SESSION["userAddress"] = $userDetails['address']; 
        } else {
            $output = "Password does not match";
        }
    } else {
        $output = "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login </title>
    <!--<link rel="stylesheet" type="text/css" href="../CSS/bulmaswatch.min.css">-->
    <link rel="stylesheet" href="https://unpkg.com/bulmaswatch/lux/bulmaswatch.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
    <link rel="icon" href="../ASSETS/favicon-diamond.ico">
    <script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>
<body>
<section class="hero is-white is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                        <h1 class="subtitle">PK<i class="far fa-gem fa-sm"></i></h1>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroC">
            <span></span>
            <span></span>
            <span></span>
          </span>
                </div>
                <div id="navbarMenuHeroC" class="navbar-menu">
                    <div class="navbar-end">
                        <a href="../index.html" class="navbar-item">
                            Home
                        </a>
<!--                        <a class="navbar-item">-->
<!--                            About us-->
<!--                        </a>-->
                        <a class="navbar-item is-active">
                            Sign In
                        </a>
                        <a class="navbar-item">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-grey">Login</h3>
                <h2 style="color: red;"><span><?php echo $output;?></span></h2>
                <div class="box">
                    <form name="form-signin" method="POST" action="./signIn.php">
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="email" placeholder="Your Email" name="email"
                                       id="email" autofocus="">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="password" placeholder="Your Password" name="pass"
                                       id="pass">
                            </div>
                        </div>
                        <div class="field">
                            <label class="checkbox">
                                <input type="checkbox">
                                Remember me
                            </label>
                        </div>
                        <button class="button is-block is-success is-large is-fullwidth">Login</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    <a href="../">Sign Up</a> &nbsp;·&nbsp;
                    <a href="../">Forgot Password</a> &nbsp;·&nbsp;
                    <a href="../">Need Help?</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!--<script async type="text/javascript" src="../js/bulma.js"></script>-->
</body>
</html>
