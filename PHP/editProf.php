<?php
//Starts new session unless a connection key is already stored in the browser
session_start();

session_start();
$userfName = "Sign In";
if(isset($_SESSION["userfName"]))
{
  $userfName = $_SESSION["userfName"];
}

$db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$qr = $db->prepare("SELECT * FROM Customer WHERE email = ?");
if (isset($_SESSION["userEmail"])) {
    $qr->execute(array($_SESSION["userEmail"]));
    $userDetails = $qr->fetch(PDO::FETCH_ASSOC);

	//If the user filled out one of the fields..
	if(isset($_POST['email']) || isset($_POST['pass']) || isset($_POST['fName']) || isset($_POST['lName']) ||
	                          isset($_POST['country']) || isset($_POST['state']) || isset($_POST['city']) || isset($_POST['addr'])) {
		//Connect to the DB
		$db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


		if(isset($_POST['email'])){
			//Updates one cell of the record
			$qr = $db->prepare("UPDATE Customer SET email = ? WHERE email = :userEmail"); 
			$qr->bindValue(':userEmail', "{$_GET['userEmail']}");
			$qr->execute(array($_POST['email']));
		}
		if(isset($_POST['pass'])){
			//Updates one cell of the record
			$qr = $db->prepare("UPDATE Customer SET password = ? WHERE email = :userEmail"); 
			$qr->bindValue(':userEmail', "{$_GET['userEmail']}");
			$qr->execute(array($_POST['pass']));
		}
		if(isset($_POST['fName'])){
			//Updates one cell of the record
			$qr = $db->prepare("UPDATE Customer SET fName = ? WHERE email =:userEmail"); 
			$qr->bindValue(':userEmail', "{$_GET['userEmail']}");
			$qr->execute(array($_POST['fName']));
		}
		if(isset($_POST['lName'])){
			//Updates one cell of the record
			$qr = $db->prepare("UPDATE Customer SET lName = ? WHERE email = :userEmail"); 
			$qr->bindValue(':userEmail', "{$_GET['userEmail']}");
			$qr->execute(array($_POST['lName']));
		}
<<<<<<< HEAD
		/*if(isset($_POST['street']){ 
=======
		if(isset($_POST['street']){
>>>>>>> f07d1ad5a4dbacf8af7a83d35b6a6ac16ce76db7
			//if they've set street, city, state, AND country, then they changed their address successfully. otherwise they get an error
			if(isset(POST['country']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['addr'])){
				//Updates the address and fields associated with the address if they entered all the data
				$qr = $db->prepare("UPDATE Customer SET country = ? WHERE email = :userEmail"); 
				$qr->bindValue(':userEmail', "{$_GET['userEmail']}");
				$qr->execute(array($_POST['country']));
				$qr = $db->prepare("UPDATE Customer SET state = ? WHERE email = :userEmail"); 
				$qr->execute(array($_POST['state']));
				$qr = $db->prepare("UPDATE Customer SET city = ? WHERE email = :userEmail"); 
				$qr->execute(array($_POST['city']));
				$qr = $db->prepare("UPDATE Customer SET  strees = ? WHERE email = :userEmail"); 
				$qr->execute(array($_POST['addr']));
			}
			else{
				$output = "Not a valid address";
			}
		}*/
	}
}else {
    echo "Profile not found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="stylesheet" type="text/css" href="../CSS/bulmaswatch.min.css">
    <link rel="icon" href="../ASSETS/favicon-diamond.ico">
    <script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    <title>PK Jewelers</title>
</head>

<body>
<section class="hero is-white is-fullheight" id="landing-page">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a href="../index.html"  class="navbar-item">
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
                        <a href="../index.html" class="navbar-item underline">
                            Home
                        </a>
                        <a href="search.php" class="navbar-item underline">
                            Shop
                        </a>
                        <a class="navbar-item underline">
                            <?php echo $_SESSION["userfName"]; ?>
                        </a>
                        <a href="contact.php" class="navbar-item underline">
                            Contact
                        </a>
                        <a onclick="signOut()" class="navbar-item underline">
                            Sign Out
                            <a  class="navbar-item underline">
                              <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                              <input type="hidden" name="cmd" value="_s-xclick">
                              <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
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
            <div class="column is-6 is-offset-4">
                <h3 class="title has-text-grey">Edit Profile Information</h3>
                <h2 style="color: red;"><span><?php echo $output; ?></span></h2>
                <div class="box">
                    <form name="form-signup" method="POST" action="./signUp.php">
<!--First Name Field-->
                        <div class="field">
                            <div class="control">
								<p><?php echo $userDetails['fName'] ?> </p>
                                <input class="input is-large" type="text" placeholder="New First Name" name="fName"
                                       id="fName" autofocus="" required>
                            </div>
                        </div>
<!--Last Name Field-->
                        <div class="field">
                            <div class="control">
								<p> <?php echo $userDetails['lName']; ?></p>
                                <input class="input is-large" type="text" placeholder="New Last Name" name="lName"
                                       id="lName" required>
                            </div>
                        </div>
<!--Email Field-->
                        <div class="field">
                            <div class="control">
							<p><?php echo $userDetails['email']; ?></p>
                                <input class="input is-large" type="email" placeholder="New Email" name="email"
                                       id="email"  required>
                            </div>
                        </div>
<!--Password Field-->
                        <div class="field">
                            <div class="control">
								<p> </p>
                                <input class="input is-large" type="password" placeholder=" New Password" name="pass"
                                       id="pass" required>
                            </div>
                        </div>
<!--Phone Number Field-->
                        <div class="field">
                            <div class="control">
								<p> <?php echo $userDetails['phone']; ?>  </p>
                                <input class="input is-large" type="text" placeholder="Phone Number" name="phone"
                                       id="phone">
                            </div>
                        </div>
<!--Address Field-->
                        <div class="field">
                            <div class="control">
								<p><?php echo $userDetails['street']; ?> </p>
                                <input class="input is-large" type="text" placeholder="New Street" name="addr"
                                       id="addr">
                            </div>
                        </div>
<!--City Field-->
                        <div class="field">
                            <div class="control">
								<p><?php echo $userDetails['city'] ?> </p>
                                <input class="input is-large" type="text" placeholder="New City" name="city"
                                       id="city" required>
                            </div>
                        </div>
<!--Country Field-->
                        <div class="field">
                          <div class="control has-icons-left">
                            <div class="select is-large is-fullwidth">
								<p><?php echo $userDetails['country']  ?> </p>
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
						  <p> <?php echo $userDetails['state']; ?></p>
                            <div class="select is-large is-fullwidth">
                              <select id="state" name="state" class="has-text-centered">
                                <option value="" selected>Select a State</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <button class="button is-block is-info is-large is-fullwidth">Submit Changes</button>
                    </form>
                </div>
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
</body>
<script src="../JS/main.js" type="text/javascript"></script>
<!--<script src="../JS/instantclick.min.js" data-no-instant></script>-->
<!--<script data-no-instant>InstantClick.init();</script>-->
</html>
