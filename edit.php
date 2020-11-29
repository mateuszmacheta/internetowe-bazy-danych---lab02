<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fname = $_POST['fname'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    
  
	//db connection
	$host         = "localhost";
	$username     = "root";
	$password     = "";
	$dbname       = "test";

	$conn = new mysqli($host, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection to database failed: " . $conn->connect_error);}
	$query = "UPDATE `subscribers` SET `fname`='" . $fname . "', `email`='" . $email . "' WHERE `id`=" . $id . ";";
	$result = $conn->query($query);
    if($result)
    {
        echo "<h1>Pomyślnie zedytowano użytkownika</h1>";
    }
    else
    {
        echo "<h1 colour='red'>Błąd - nieudana edycja użytkownika.</h1>";
    }
	mysqli_close($conn);
}


?>
<a href="viewsubscribers.php">Back</a>