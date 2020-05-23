<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
/*
$sql = "CREATE TABLE user (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
mobile VARCHAR(11),
password VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} 
*/

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$stmt = $conn->prepare("INSERT INTO user (firstname, lastname, email, mobile, password) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss", $firstname , $lastname, $email , $mobile , $password);
$stmt->execute();

echo 'Account created successfully';

echo "<a href='http://localhost:8012/login.html'>Click Here to Login</a>";

$conn->close();
?>
