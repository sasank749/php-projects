<?php include('headerOfMovie.php'); ?>
<body>
<?php include('navbarOfMovie.php'); ?>
<div class="container">
	<h1 class="page-header text-center">Users</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Time of Regustration</th>
			<th>UserName</th>
			<th>email</th>
			<th>Delete User</th>
        </thead>
		<tbody>
			<?php 
				$sql="select * from users order by id desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['trn_date'])) ?></td>
						<td><?php echo $row['username']; ?></td>
						<td><?php echo $row['email']; ?></td>
							
						
				<td><a href="deleteuserOfMovie.php?product=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a></td>


					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>