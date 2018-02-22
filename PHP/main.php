<?php
/**
 * User: jash
 * Date: 2/18/18
 * Time: 11:32 PM
 */
 
//I got this code from w3 schools -Jackie


$servername = "pkjeweldb.cpw1gobwezg5.us-east-2.rds.amazonaws.com";
$username = "pkMUser";
$password = "Fellowship123";
$dbName = "PKJdb";
// The database instance name is pkjewelDB but the database name is PKJdb 
// so idk which we should use -Jackie

// Create connection
$conn = new mysqli($servername, $username, $password,$dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// DML
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 
 ?>