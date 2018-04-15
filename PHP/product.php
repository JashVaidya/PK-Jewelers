<?php
$db = new PDO('mysql:host=localhost;dbname=pkjewelers', 'fellowship', 'Ns42Wdu93J3lwgC');
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$qr = $db->prepare("SELECT * FROM Product WHERE pId like :keyWord");
$qr->bindValue(':keyWord', "%0%");
$count = 0;

if ($qr->execute()) {

    if ($results = $qr->fetch(PDO::FETCH_ASSOC)) {

        echo "<img src = \"../ASSETS/" . $results['picture'] . "\"><br>";
        echo $results['pName'] . "<br>";
        echo $results['price'] . "<br>";
        echo $results['pBtn'] . "<br>";
    }
} else {
    echo "<script>document.write('No results for: " . $_POST['prodcutInfo'] . "')</script>";
}
?>
