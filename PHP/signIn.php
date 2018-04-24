<?php
//Starts a PHP session to be used on multiple pages, accesd with $_SESSION variable
session_start();

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
            $_SESSION["userEmail"] = $userDetails['email'];
            $_SESSION["userfName"] = $userDetails['fName'];
            $_SESSION["userlName"] = $userDetails['lName'];
            header('Location: https://' . $_SERVER['HTTP_HOST'] . $uri . '/profile.php');
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
    <link rel="stylesheet" type="text/css" href="../CSS/bulmaswatch.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
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
                    <a href="../index.php" class="navbar-item">
                        <h1 class="title is-2 is-blue">PK <i class="far fa-gem fa-sm"></i> JEWELERS</h1>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroC">
                    <span></span>
                    <span></span>
                    <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroC" class="navbar-menu has-text-centered">
                    <div class="navbar-end">
                        <a href="../index.php" class="navbar-item underline">
                            Home
                        </a>
                        <a href="search.php" class="navbar-item underline">
                            Shop
                        </a>
                        <a class="navbar-item underline">
                            Sign In
                        </a>
                        <a href="contact.php" class="navbar-item underline">
                            Contact
                        </a>
                        <a class="navbar-item underline">
                          <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                          <input type="hidden" name="cmd" value="_s-xclick">
                          <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIG1QYJKoZIhvcNAQcEoIIGxjCCBsICAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAsFkcHY1HMerlchBwWcOzBqdfNmPWTjIR/x5K9FftGkE6TmVePwKQe/dggokPP92yxTQoYjRExF8r27XBbqxAFl6uZJsfkU4+/s51IaLhKT5+dduRRDTQJgxuxfWcdLxng4ovgIExZaxyG5sWkKBmHgaXHtYvGYFjzEZnLqzBVmDELMAkGBSsOAwIaBQAwUwYJKoZIhvcNAQcBMBQGCCqGSIb3DQMHBAhHc8P9acTdFoAw1l4QJ4n9uVJKgNocKkJb84rsas6mRb0695TgaJo2n30Gzw9AtzMBReFa2RwYSXFtoIIDhzCCA4MwggLsoAMCAQICAQAwDQYJKoZIhvcNAQEFBQAwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMB4XDTA0MDIxMzEwMTMxNVoXDTM1MDIxMzEwMTMxNVowgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBR07d/ETMS1ycjtkpkvjXZe9k+6CieLuLsPumsJ7QC1odNz3sJiCbs2wC0nLE0uLGaEtXynIgRqIddYCHx88pb5HTXv4SZeuv0Rqq4+axW9PLAAATU8w04qqjaSXgbGLP3NmohqM6bV9kZZwZLR/klDaQGo1u9uDb9lr4Yn+rBQIDAQABo4HuMIHrMB0GA1UdDgQWBBSWn3y7xm8XvVk/UtcKG+wQ1mSUazCBuwYDVR0jBIGzMIGwgBSWn3y7xm8XvVk/UtcKG+wQ1mSUa6GBlKSBkTCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb22CAQAwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQUFAAOBgQCBXzpWmoBa5e9fo6ujionW1hUhPkOBakTr3YCDjbYfvJEiv/2P+IobhOGJr85+XHhN0v4gUkEDI8r2/rNk1m0GA8HKddvTjyGw/XqXa+LSTlDYkqI8OwR8GEYj4efEtcRpRYBxV8KxAW93YDWzFGvruKnnLbDAF6VR5w/cCMn5hzGCAZowggGWAgEBMIGUMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbQIBADAJBgUrDgMCGgUAoF0wGAYJKoZIhvcNAQkDMQsGCSqGSIb3DQEHATAcBgkqhkiG9w0BCQUxDxcNMTgwNDExMTIyMDU5WjAjBgkqhkiG9w0BCQQxFgQU/8rKxiN+ZLVz8EAONwId6vSJ8vswDQYJKoZIhvcNAQEBBQAEgYCIKsEVu1B7Sifo4w9pkOdQU3PSXC4cqQVQKAv/vsoGHkbk/iC+EpSDsJpDfWzpOtrYRtbQQp7PY45mR7R4dfOpp82icpBpGSliTyJggURwE/H4nDf4n5LHbQTqCiHDPzwtyKHEdZ1aKjwYrdqp/NSo+5TMeqHDwLpGfKWS/iPJMQ==-----END PKCS7-----
                          ">
                          <input type="image" src="../ASSETS/bag.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                          <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                          </form>
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
                <h2 style="color: red;"><span><?php echo $output; ?></span></h2>
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
                        <button class="button is-block is-info is-large is-fullwidth">Login</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    <a href="./signUp.php">Sign Up</a> &nbsp;·&nbsp;
                    <a href="../">Forgot Password</a> &nbsp;·&nbsp;
                    <a href="../">Need Help?</a>
                </p>
            </div>
        </div>
    </div>
</section>

<footer class="footer is-blue2 ">
    <div class="container">
        <div class="content has-text-centered">
            <ul style="list-style-type: none;">
                <li><a href="tel:5403661119" class="has-text-white">(540)-366-1119    |</a></li>
                <li><a class="has-text-white">4802 Valley View Blvd. NW #t63b, Roanoke, VA 24012    |</a></li>
                <li><a class="has-text-white">mehulvaidya2008@gmail.com</a></li>
            </ul>
        </div>
    </div>
</footer>
</body><!--<script async type="text/javascript" src="../js/bulma.js"></script>-->
<script src="../JS/main.js" type="text/javascript"></script>
<!--<script src="../JS/instantclick.min.js" data-no-instant></script>-->
<!--<script data-no-instant>InstantClick.init();</script>-->
</html>
