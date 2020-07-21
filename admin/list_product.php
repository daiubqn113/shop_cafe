<?php
	require('../config/connect.php'); 
	include('header.php');
 ?>
<?php 
	$sql = "SELECT product.*, category.name as 'category_name' FROM product JOIN category ON product.category_id = category.id";
	$query_pro = mysqli_query($conn, $sql);
	$total = mysqli_num_rows($query_pro);
	// echo '<pre>';
	// 	print_r($sql);
	// echo '</pre>';


	$limit = 3;
	$page = ceil($total / $limit);
	// echo $page;

	$sqlll = "SELECT product.*, category.name as 'category_name' FROM product JOIN category ON product.category_id = category.id LIMIT 27, $limit";
	$query_product = mysqli_query($conn, $sqlll);
?>

<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Danh sách sản phẩm</div>
		<div class="panel-body">
		</div>
		<!-- Table -->
		<form action="" method="">
			<table class="table">
				<a href="add_product.php" class="btn btn-success">Thêm sản phẩm</a>
				<thead>
					<tr>
						<th>ID</th>
						<th>Imgage</th>
						<th>Name</th>
						<th>Price</th>
						<th>Price sale</th>
						<th>Create at</th>
						<th>Danh mục</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query_pro as $key => $pro) : ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><img src="upload_file/<?php echo $pro['images']; ?>" alt="" width = '60px'></td>
							<td><?php echo $pro['name']; ?></td>
							<td><?php echo $pro['price']; ?></td>
							<td><?php echo $pro['price_sale']; ?></td>
							<td><?php echo $pro['create_at']; ?></td>
							<td><?php echo $pro['category_name']; ?></td>
							<td><a href="update_product.php?id=<?php echo $pro['id']; ?>" class="btn btn-success">Sửa</a>
								<a href="delete_product.php?id=<?php echo $pro['id']; ?> " class="btn btn-success">Xóa</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</form>
		<div class="panel-footer">
			<a href="category.php" class="btn btn-primary">Quay lại danh mục</a>
		</div>
	</div>
</div>