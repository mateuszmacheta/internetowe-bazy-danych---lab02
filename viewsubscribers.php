<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=980px, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
    <title>View subscribers</title>
</head>
<body>
<?php require("menu.php"); ?>
<h1>Wyświetl użytkowników</h1>
<h2>Delete - powoduje usunięcie użytkownika, oraz uruchomienie wyzwalacza po usunięciu.</h2>
<h2>Edit - po edycji użytkownika zostanie uruchomiony wyzwalacz</h2>
<table class="w3-table-all w3-card-4">
<tr>
    <th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>
<?php
//db connection
$host         = "localhost";
$username     = "root";
$password     = "";
$dbname       = "test";
$result = 0;
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection to database failed: " . $conn->connect_error);}
$query = "SELECT `id`, `fname`, `email` FROM `subscribers`";
$result = $conn->query($query);
while ($row = $result->fetch_row())
{
    echo "\t<tr>\n";
    printf ("\t\t<td>%s</td>\n\t\t<td>%s</td>\n\t\t<td>%s</td>\n", $row[0], $row[1], $row[2]);
    printf ("\t\t<td><a href='subscriber_edit.php?id=%s'>Edit</a> | <a href='subscriber_del.php?id=%s'>Delete</a></td>\n", $row[0], $row[0]);
    echo "\t</tr>\n";

    
}
mysqli_close($conn);
?>
</table>
</body>
</html>