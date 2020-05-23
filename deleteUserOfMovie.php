<?php
	include('conn.php');

	$id = $_GET['product'];

	$sql="delete from users where id='$id'";
	$conn->query($sql);
	echo 'delete';

	header('location:AdminsOfMovie.php');
?>