<?php
	include('conn.php');

	$id = $_GET['product'];

	$sql="delete from purchase where purchaseid='$id'";
	$conn->query($sql);
	echo 'delete';

	header('location:salesOfMovie.php');
?>