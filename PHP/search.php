<?php
echo "step 1 <br>";
$db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "connected to the databse <br>";
$qr = $db->prepare("SELECT * FROM Inventory WHERE pTag like :keyWord");
$qr->bindValue(':keyWord', "%{$_GET['item']}%");
echo "got past the prepare <br>";
echo "The search text: " . $_GET['item'] . "<br>";
if($qr->execute())
{
  echo "got past the query <br>";
  if($results = $qr->fetchAll())
  {
    echo "Got the results <br>";
    foreach ($results as $lineItem)
    {
      echo "we loopin <br>";
      echo "Name: " . $lineItem['pName'];
      addItem($lineItem['pName'], $lineItem['price']);
    }
  }
}
?>

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
<body>
<section class="hero is-white is-fullheight">
    <!-- Hero head: will stick at the top -->
    <div class="hero-head">
        <header class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item">
                        <h1 class="title is-2">PK<i class="far fa-gem fa-sm"></i></h1>
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
                        <a class="navbar-item underline">
                            Sign In
                        </a>
                        <a class="navbar-item underline">
                            <i class="fa fa-shopping-cart fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <div class = "columns">
      <div class = "column is-one-fifth">
          <p> THIS IS A SHORT COLUMN </p>
      </div>
      <div class = "column is-four-fifths">
          <table id = "results">
          </table>
      </div>
    </div>
<script>
  function addItem(name, price)
  {
    var table = document.getElementById('results');
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "" + $name;
    cell2.innerHTML = "" + $price;
  }
</script>
</html>
