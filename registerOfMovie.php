<?php include('headerOfMovie.php'); ?>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="registerOfMovie.php"><b>Movie Booking System</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="registerOfMovie.php">FilimsList</a></li>
        <li><a href="registerOfMovie.php">Booking</a></li>
        <li><a href="registerOfMovie.php">TicketSales</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenace <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="registerOfMovie.php">AddMovies</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="registerOfMovie.php">AddLanguage</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid --><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/styleOfMovie.css" />
</head>
<body>
<?php
require('conn.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($conn,$username); 
 $email = stripslashes($_REQUEST['email']);
 $email = mysqli_real_escape_string($conn,$email);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($conn,$password);
 $trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='loginOfMovie.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required /><br/>
<input type="email" name="email" placeholder="Email" required /><br/>
<input type="password" name="password" placeholder="Password" required /><br/>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>