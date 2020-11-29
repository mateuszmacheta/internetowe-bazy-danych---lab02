<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=980px, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Edit user</title>
</head>
<body>
<?php require("menu.php"); ?>
<h1>Edycja użytkownika</h1>
<form action="edit.php" method="post">
<label for="fname">Imię:</label><br/>

<?php
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "test";
$id = $_GET["id"];
$result = 0;
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);}
$query = "SELECT `id`, `fname`, `email` FROM `subscribers` WHERE `id` = " . $id .";";
$result = $conn->query($query);
$row = $result->fetch_row();
$id = $row[0];
$fname = $row[1];
$email = $row[2];
mysqli_close($conn);

  echo "<input type='text' id='fname' name='fname' value='" . $fname . "'><br/>\n";
  echo "<label for='lname'>Email:</label><br/>\n";
  echo "<input type='text' id='email' name='email' value='" . $email . "'><br/><br/>\n";
  echo "<input type='hidden' id='id' name='id' value='" . $id . "'>\n";
  echo "<input type='submit' value='Edit subscriber'>\n";

?>
</form>
</body>
</html>