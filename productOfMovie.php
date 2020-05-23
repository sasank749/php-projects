<?php include('headerOfMovie.php'); ?>
<body>
<?php include('navbarOfMovie.php'); ?>
<div class="container">
	<h1 class="page-header text-center">MOVIES CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Languages</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Movie</a>
		</div>
	</div>
	<div style="margin-top:10px;">
		<table class="table table-striped table-bordered">
			<thead>
				<th>Logo</th>
				<th>Movie Name</th>
				<th>Language</th>
				<th>Price</th>
				<th>Director</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>"><img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="30px" width="40px"></a></td>
							<td><?php echo $row['productname']; ?></td>
							<td><?php echo $row['catname']; ?></td>
                            <td>&#x20A8; <?php echo number_format($row['price'], 2); ?></td>
							<td><?php echo $row['director']; ?></td>
							<td><a href="#editproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deleteproduct<?php echo $row['productid']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
								<?php include('product_modalOfMovie.php'); ?>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<?php include('modalOfMovie.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'productOfMovie.php';
			}
			else
			{
				window.location = 'productOfMovie.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>