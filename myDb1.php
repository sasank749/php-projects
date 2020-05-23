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

// sql to create table
/*
$sql = "CREATE TABLE details (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
name VARCHAR(30) NOT NULL,
address VARCHAR(50),
country VARCHAR(11),
zipcode INT(6),
email VARCHAR(50) NOT NULL,
sex VARCHAR NOT NULL,
language VARCHAR(30),
about VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . $conn->error;
} 
*/

$userid = $_POST["userid"];
$password = $_POST["passid"];
$name = $_POST["username"];
$address = $_POST["address"];
$country = $_POST["country"];
$zipcode = $_POST["zip"];
$email = $_POST["email"];
$sex = $_POST["sex"];
$language = $_POST["lang"];
$about = $_POST["desc"];
$stmt = $conn->prepare("INSERT INTO details (userid, password, name, address, country, zipcode, email, sex, language, about) VALUES (?,?,?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssssss", $userid , $password, $name , $address , $country, $zipcode, $email, $sex, $language, $about);
$stmt->execute();

echo 'Account created successfully';

echo "<a href='http://localhost:8012/login1.html'>Click Here to Login</a>";

$conn->close();
?>
