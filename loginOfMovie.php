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
      <a class="navbar-brand" href="loginOfMovie.php"><b>Movie Booking System</b></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="loginOfMovie.php">FilimsList</a></li>
        <li><a href="loginOfMovie.php">Booking</a></li>
        <li><a href="loginOfMovie.php">TicketSales</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maintenace <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="loginOfMovie.php">AddMovies</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="loginOfMovie.php">AddLanguage</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/styleOfMovie.css" />
</head>
<body>
<?php
require('conn.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($conn,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($conn,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($conn,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
            // Redirect user to index.php
     header("Location: indexOfMovie.php");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='loginOfMovie.php'>Login</a></div>";
 }
    }else{
?>
<!--
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<button type="submit" class="btn btn-primary">Login</button>
</form>
<p>Not registered yet? <a href='registerOfMovie.php'>Register Here</a></p>
</div>
-->

<form class="form-horizontal" action=""  method="post" name="login">
<br/><br/>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Username:</label>
    <div class="col-sm-2">
      <input type="text" name="username" class="form-control" id="email" placeholder="Enter Username">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-2">
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
	  <p>Not registered yet? <a href='registerOfMovie.php'>Register Here</a></p>

    </div>
  </div>
</form>


<?php } ?>
</body>
</html>
