<!DOCTYPE html>
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
                        <a href="signIn.php" class="navbar-item underline">
                            Sign In
                        </a>
                        <a href="shopTest.php" class="navbar-item underline">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
		
<div class="hero-body">
        
            
                
               
                    <form name="form-shopTest" method="get" action="<?=$_SERVER['PHP_SELF'];?>">
                        <div class="field">
                            <div class="control">
                                <input  type="text" placeholder="Item" name="item"
                                       id="item" autofocus="">
                            </div>
                        </div>
                        <button>Search</button>
                    </form>
               

            
       
    </div>
    <div class="hero-body">
        <div class="columns">
            <div class="column is-two-fifths">
                <form id="form1">
                    <div class="container" style="width:100%">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid blue">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#menuOne">
                                            <b>METAL TYPE</b> <span class="glyphicon glyphicon-minus"
                                                                    style="float:right; color:blue"></span>

                                        </a>
                                    </h4>
                                </div>
                                <div id="menuOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <input id="Checkbox1" type="checkbox"/> Gold<br/>
                                        <input id="Checkbox1" type="checkbox"/> Silver<br/>
                                        <input id="Checkbox1" type="checkbox"/> Platinum<br/>
                                        <input id="Checkbox1" type="checkbox"/> Palladium
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid blue">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#menuTwo">
                                            <b>METAL COLOR</b><span class="glyphicon glyphicon-minus"
                                                                    style="float:right; color:blue"></span>
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
                                <div class="panel-heading" style="border-left:5px solid blue">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#menuThree">
                                            <b>METAL KARAT</b> <span class="glyphicon glyphicon-minus"
                                                                     style="float:right; color:blue"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="menuThree" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>Place Holder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid blue">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#menuFour">

                                            <b>ENGRAVABLE</b> <span class="glyphicon glyphicon-minus"
                                                                    style="float:right; color:blue"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="menuFour" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>Place Holder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" style="border-left:5px solid blue">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                                           href="#menuFive">

                                            <b>GENDER</b> <span class="glyphicon glyphicon-minus"
                                                                style="float:right; color:blue"></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="menuFive" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p>Place Holder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
			<div class="column is-one-fifth">
                
            </div>
            <div class="column is-two-fifths">
                <table id="results" width="400">
                </table>
            </div>
        </div>
    </div>
</section>
<footer class="footer is-blue2 ">
    <div class="container">
        <div class="content has-text-centered">
            <ul style="list-style-type: none;">
                <li><a class="has-text-white">(540)-366-1119    |</a></li>
                <li><a class="has-text-white">4802 Valley View Blvd. NW #t63b, Roanoke, VA 24012    |</a></li>
                <li><a class="has-text-white">mehulvaidya2008@gmail.com</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>

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
      var table = document.getElementById('results');
      var picture = '<img src = \"../ASSETS/" . $lineItem['picture'] . "\">';
      var row = table.insertRow(0);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      cell1.innerHTML = picture
      cell2.innerHTML = '"   . $lineItem['pName'] .   "';
      cell3.innerHTML = '"   . $lineItem['price'] .   "';
      </script>";
        }
    }
} else {
    echo "<script>document.write('No results for: " . $_GET['item'] . "')</script>";
}
?>
