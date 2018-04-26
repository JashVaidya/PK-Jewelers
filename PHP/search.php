<!DOCTYPE html>
<?php
session_start();
$userfName = "Sign In";
if(isset($_SESSION["userfName"]))
{
  $userfName = $_SESSION["userfName"];
}
 ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PK </title>
    <link rel="stylesheet" type="text/css" href="../CSS/bulmaswatch.min.css">
    <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    <link rel="icon" href="../ASSETS/favicon-diamond.ico">
    <script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
</head>

<style>
    table, th, td {
        border: 0px solid black;
    }
</style>

<body>
<section class="hero is-white is-halfheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a href="../index.php"  class="navbar-item">
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
                        <a href="signIn.php" class="navbar-item underline">
                            <?php echo $userfName; ?>
                        </a>
                        <a href="contact.php" class="navbar-item underline">
                            Contact
                        </a>
                        <a class="navbar-item underline">
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

    <div class="hero-body">
        <form name="form-shopTest" method="get" action="<?=$_SERVER['PHP_SELF'];?>">
                <div class="field has-addons">
                    <div class="control" >
                        <input class="input" type="text" placeholder="Item" name="item"
                                id="item" autofocus="" >

                    </div>
                    <div class="control">
                            <button class="button" style="color: hsl(204, 86%, 53%);">Search</button>
                    </div>
                </div>
        </form>
    </div>

    <div class="hero-body">
        <div class="columns">
            <div class="column is-one-fifth">
                <form id="form1">
                    <div class="container" style="width:100%">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid cyan">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                            <b>METAL TYPE</b> <span class="glyphicon glyphicon-minus"
                                                                    style="float:right; color:cyan"></span>

                                        </a>
                                    </h4>
                                </div>
                                <div id="menuOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <input id="Checkbox1" type="checkbox"/> Gold<br/>
                                        <input id="Checkbox1" type="checkbox"/> Silver<br/>
                                        <input id="Checkbox1" type="checkbox"/> Platinum<br/>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid cyan">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">
                                            <b>METAL COLOR</b><span class="glyphicon glyphicon-minus"
                                                                    style="float:right; color:cyan"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="menuTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <input id="Checkbox1" type="checkbox"/> White<br/>
                                        <input id="Checkbox1" type="checkbox"/> Yellow<br/>
                                        <input id="Checkbox1" type="checkbox"/> Rose<br/>
                                        <input id="Checkbox1" type="checkbox"/> Multi
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid cyan">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">

                                            <b>GENDER</b> <span class="glyphicon glyphicon-minus"
                                                                style="float:right; color:cyan"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="menuFive" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <input id="Checkbox1" type="checkbox"/> Male<br/>
                                        <input id="Checkbox1" type="checkbox"/> Female<br/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
			<div class="column is-four-fifths">
        <div class="container" id="searchResults">
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
</html>

<?php
$db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qr = $db->prepare("SELECT * FROM Product WHERE pName like :keyWord");
$qr->bindValue(':keyWord', "%{$_GET['item']}%");
$count = 0;
if ($qr->execute()) {
    if ($results = $qr->fetchAll()) {

        foreach ($results as $lineItem) {
            echo "<script>
      var table = document.getElementById(\"searchResults\");

      var bigBox = document.createElement(\"DIV\");
      bigBox.setAttribute(\"class\", \"columns\");

      var picture = document.createElement(\"IMG\");
      picture.setAttribute(\"src\", \"../ASSETS/" . $lineItem['picture'] . "\");
      var column1 = document.createElement(\"DIV\");
      column1.setAttribute(\"class\", \"column is-one-fifth\");
      column1.appendChild(picture);

      var pName = document.createTextNode(\"" . $lineItem['pName'] . "\");
      var column2 = document.createElement(\"DIV\");
      column2.setAttribute(\"class\", \"column is-one-fifth\");
      column2.appendChild(pName);

      var price = document.createTextNode(\"$" . $lineItem['price'] . "\");
      var column3 = document.createElement(\"DIV\");
      column3.setAttribute(\"class\", \"column is-one-fifth\");
      column3.appendChild(price);

      var column4 = document.createElement(\"DIV\");
      column4.setAttribute(\"class\", \"column is-one-fifth\");
      column4.innerHTML = \"<form target='target' action='https://www.paypal.com/cgi-bin/webscr' method='post'><input type='hidden' name='cmd' value='_s-xclick'><input type='hidden' name='hosted_button_id' value='".$lineItem['ppId']."'><input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'><img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1'height='1'></form>\";

      bigBox.appendChild(column1);
      bigBox.appendChild(column2);
      bigBox.appendChild(column3);
      bigBox.appendChild(column4);

      table.appendChild(bigBox);
     </script>";
        }
    }
} else {
    echo "<script>document.write('No results for: " . $_GET['item'] . "')</script>";
}
?>
