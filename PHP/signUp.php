<?php
session_start();
//Defining the salting encryption standard
define("SALT", 'ASDGasdfvartWFGSD#$5t2345HFDSY45yw4rget4312');
$output = "";

//Checks to make sure all required fields were filled out in the form
if(isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['fName']) && isset($_POST['lName']) && isset($_POST['city'])) {
  //Creates a PDO database object that has the credentials of the database login
  $db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Queries the database for some info, in this case, all of the columns. This is not important right now, will change later on when known columns are needed
  $qr = $db->prepare("SELECT * FROM Customer WHERE email = ?");
  $qr->execute(array($_POST['email']));

  //Returns true if the user is found in the database
  if (!($userDetails = $qr->fetch(PDO::FETCH_ASSOC))) {
    $qr = $db->prepare("INSERT INTO Customer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"); //Not sure what to put for first param, matches to custID(primary key) in database
    $accCreated = $qr->execute(array($_POST['fName'], $_POST['lName'], crypt($_POST['pass'], SALT), $_POST['phone'], $_POST['email'], $_POST['country'], $_POST['state'], $_POST['city'], $_POST['addr']));
    if($accCreated)
    {
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header('Location: https://' . $_SERVER['HTTP_HOST'] . $uri . '/profile.php');
    }
  }
  else {
      $output = "Email already in use.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up </title>
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
                    <a class="navbar-item">
                        <h1 class="title is-1 is-blue">PK <i class="far fa-gem fa-sm"></i> JEWELERS</h1>
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroC">
                    <span></span>
                    <span></span>
                    <span></span>
                    </span>
                </div>
                <div id="navbarMenuHeroC" class="navbar-menu has-text-centered">
                    <div class="navbar-end">
                        <a href="../index.html" class="navbar-item underline">
                            Home
                        </a>
                        <a href="search.php" class="navbar-item underline">
                            Shop
                        </a>
                        <a href="./signIn.php" class="navbar-item underline">
                            Sign In
                        </a>
                        <a  class="navbar-item underline">
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
                <h3 class="title has-text-grey">Sign Up</h3>
                <h2 style="color: red;"><span><?php echo $output; ?></span></h2>
                <div class="box">
                    <form name="form-signup" method="POST" action="./signUp.php">
<!--First Name Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" placeholder="First Name" name="fName"
                                       id="fName" autofocus="" required>
                            </div>
                        </div>
<!--Last Name Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" placeholder="Last Name" name="lName"
                                       id="lName" required>
                            </div>
                        </div>
<!--Email Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="email" placeholder="Email" name="email"
                                       id="email"  required>
                            </div>
                        </div>
<!--Password Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="password" placeholder="Password" name="pass"
                                       id="pass" required>
                            </div>
                        </div>
<!--Phone Number Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" placeholder="Phone Number" name="phone"
                                       id="phone">
                            </div>
                        </div>
<!--Address Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" placeholder="Street" name="addr"
                                       id="addr">
                            </div>
                        </div>
<!--City Field-->
                        <div class="field">
                            <div class="control">
                                <input class="input is-large" type="text" placeholder="City" name="city"
                                       id="city" required>
                            </div>
                        </div>
<!--Country Field-->
                        <div class="field">
                          <div class="control has-icons-left">
                            <div class="select is-large is-fullwidth">
                              <select id="country" name="country" class="has-text-centered">
                                <option value="" selected>Select a Country</option>
                              </select>
                            </div>
                            <div class="icon is-small is-left">
                              <i class="fas fa-globe"></i>
                            </div>
                          </div>
                        </div>
<!--State Field-->
                        <div class="field">
                          <div class="control">
                            <div class="select is-large is-fullwidth">
                              <select id="state" name="state" class="has-text-centered">
                                <option value="" selected>Select a State</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <button class="button is-block is-info is-large is-fullwidth">Sign Up</button>
                    </form>
                </div>
                <p class="has-text-grey">
                    <a href="./signIn.php">Sign In</a> &nbsp;·&nbsp;
                    <a href="../">Forgot Password</a> &nbsp;·&nbsp;
                    <a href="../">Need Help?</a>
                </p>
            </div>
        </div>
    </div>
</section>
</body>
<!--Populates the Country and State Dropdown choices-->
<script src="../JS/regionOptions.js"></script>
<script src="../JS/main.js" type="text/javascript"></script>
</html>
