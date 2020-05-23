<!DOCTYPE html>
<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userid = $_POST["userid"];
$password = $_POST["password"];

$sql = "SELECT userid, password FROM details";
$result = $conn->query($sql);
$found = false;

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($userid === $row["userid"] && $password === $row["password"]){
		    $found = true;	
		}
    }
}
if($found){
	echo "Login successfull......";
	echo "<a href='http://localhost:8012/index1.php'>Click Here</a>";
}else{
	echo "Invalid username or password";
	echo "<a href='http://localhost:8012/login1.html'>Click Here to Try Again </a>";
}

$conn->close();
?>

</body>
</html>