<?php
if (isset($_POST["email"])) {
    $company_email = "jashvaidya7x@gmail.com";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $submitted = "Name: " . $name . "\n";
    $submitted .= "Email: " . $email . "\n";
    $submitted .= "Message: " . $message . "\n";
    $subject = $name . " Comments";
    $header = "From: jash@pkjeweler.com";
    $mail = mail($company_email, $subject, $submitted, $header);
    if ($mail)
        echo "success";
    else
        echo "fail";
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
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="icon" href="../ASSETS/favicon-diamond.ico">
    <title>PK Jewelers</title>
</head>

<section class="hero is-white is-fullheight" id="landing-page">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
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
                        <a href="signIn.php" class="navbar-item underline">
                            Sign In
                        </a>
                        <a href="contact.php" class="navbar-item underline">
                            Contact
                        </a>
                        <a class="navbar-item underline">
                            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
                          ">
                                <input type="image" src="../ASSETS/bag.png" border="0" name="submit"
                                       alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif"
                                     width="1" height="1">
                            </form>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <div class="hero-body is-fullheight">
        <div class="container has-text-centered">
            <h1 class="title ">Let's Get In Touch</h1>
            <form action="contact.php" method="post">
                <div class="field has-addons has-addons-centered">
                    <label class="label is-large">Name </label>
                    <div class="control has-icons-left has-icons-right">
                        <input  id="name" name="name" class="input" type="text" placeholder="e.g Alex Smith">
                        <span class="icon is-small is-left">
				<i class="fas fa-user"></i>
			</span>
                    </div>
                </div>

                <div class="field has-addons has-addons-centered">
                    <label class="label is-large">Email </label>
                    <p class="control has-icons-left has-icons-right">
                        <input id="email" name="email" class="input" type="email" placeholder="Email">
                        <span class="icon is-small is-left">
		<i class="fas fa-envelope"></i>
		</span>
                        <span class="icon is-small is-right">
		<i class="fas fa-check"></i>
		</span>
                    </p>
                </div>

                <div class="field has-addons has-addons-centered">
                    <label class="label is-large">Message</label>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                            <textarea id="message" name="message" class="textarea"
                                      placeholder="Explain how we can help you"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field has-addons has-addons-centered">

                    <div class="field">
                        <div class="control">
                            <input type="submit" class="button is-info">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<footer class="footer is-blue2 ">
    <div class="container">
        <div class="content has-text-centered">
            <ul style="list-style-type: none;">
                <li><a class="has-text-white">(540)-366-1119 |</a></li>
                <li><a class="has-text-white">4802 Valley View Blvd. NW #t63b, Roanoke, VA 24012 |</a></li>
                <li><a class="has-text-white">mehulvaidya2008@gmail.com</a></li>
            </ul>
        </div>
    </div>
</footer>


</body>
<script src="../JS/main.js" type="text/javascript"></script>
<!--<script src="JS/instantclick.min.js" data-no-instant></script>-->
<!--<script data-no-instant>InstantClick.init();</script>-->
</html>
