<?php
	include('conn.php');

	$pname=$_POST['pname'];
	$category=$_POST['category'];
    $price=$_POST['price'];
	$director=$_POST['director'];

	$fileinfo=PATHINFO($_FILES["photo"]["name"]);

	if(empty($fileinfo['filename'])){
		$location="";
	}
	else{
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;
	}
	
	$sql="insert into product (productname, categoryid, price,director, photo) values ('$pname', '$category', '$price', '$director' ,'$location')";
	$conn->query($sql);

	header('location:productOfMovie.php');

?>