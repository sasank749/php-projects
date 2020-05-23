<?php include('headerOfMovie.php'); ?>
<body>
<?php include('navbarOfMovie.php'); ?>
<div class="container">
	<h1 class="page-header text-center">Ticket Sales</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Date Of Booking</th>
			<th>Customer Name</th>
			<th>Total Bookings</th>
			<th>Details of Bookings</th>
			<th>Delete Booking details</th>
        </thead>
		<tbody>
			<?php 
				$sql="select * from purchase order by purchaseid desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#x20A8; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
						<?php include('sales_modalOfMovie.php'); ?>
							
						
				<td><a href="deletesalesOfMovie.php?product=<?php echo $row['purchaseid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a></td>


					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>