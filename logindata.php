<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT email, password FROM user";
$result = $conn->query($sql);
$found = false;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($email === $row["email"] && $password === $row["password"]){
		    $found = true;	
		}
    }
}
if($found){
	echo "Login successfull......";
	echo "<a href='http://localhost:8012/index1.php'>Click Here</a>";
}else{
	echo "Invalid username or password";
	echo "<a href='http://localhost:8012/login.html'>Click Here to Try Again </a>";
}

$conn->close();
?>

</body>
</html>