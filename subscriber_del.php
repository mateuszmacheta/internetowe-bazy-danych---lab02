<?php

$id = $_GET["id"];

//db connection
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "test";
$result = 0;
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);}
$query = "DELETE FROM `subscribers` WHERE `id` =" . $id . ";" ;
$result = $conn->query($query);
if($result)
{
    echo "User id " . $id . " deleted.";
}
else
{
    echo "Failed to delete user id " . $id . ".";
}
?>
<br/>
<a href="viewsubscribers.php">Back</a>