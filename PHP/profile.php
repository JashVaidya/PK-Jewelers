<?php
  //Starts new session unless a connection key is already stored in the browser
  session_start();

  $db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $qr = $db->prepare("SELECT fName, lName FROM Customer WHERE email = ?");

  if(isset($_SESSION["userEmail"])) {
    $qr->execute(array($_SESSION["userEmail"]));
    $userDetails = $qr->fetch(PDO::FETCH_ASSOC);
  } else {
    echo "Profile not found";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <!--<link rel="stylesheet" type="text/css" href="../CSS/bulmaswatch.min.css">-->
    <link rel="stylesheet" href="https://unpkg.com/bulmaswatch/lux/bulmaswatch.min.css">
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
                    <a class="navbar-item">
                        <h1 class="subtitle">PK
                            <i class="far fa-gem fa-sm"></i>
                        </h1>
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
                        <!--<a class="navbar-item">-->
                            <!--About us-->
                        <!--</a>-->
                        <a class="navbar-item is-active">
                            <?php echo $userDetails["fName"]; ?>
                        </a>
                        <a onclick="signOut()" class="navbar-item">
                            Sign Out
                        <a class="navbar-item">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Hero content: will be in the middle -->
    <div class="hero-body">
        <div class="container has-text-centered">
            <h1 class="title">
                Title
            </h1>
            <h2 class="subtitle ">
                subtitle
            </h2>
            <!--<a >-->
            <!--<i class="far fa-gem fa-3x has-text-dark"></i>-->
            <!--</a>-->
        </div>
    </div>
</section>

<section class="section is-medium" id="about-section">
    <div class="container has-text-centered">
        <div class="columns">
            <div class="column">
                <h1 class="title">Who We Are</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum debitis delectus distinctio excepturi
                    exercitationem, illum impedit in, ipsum laudantium magnam minus nostrum obcaecati officiis quas
                    sapiente sint tempore velit voluptate?
                </p>
            </div>
        </div>
    </div>
</section>
</body>

</html>
