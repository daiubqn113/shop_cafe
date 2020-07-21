<?php 
	include('../header.php');
	require('../../config/connect.php'); 

	// Câu lệnh truy vấn
	$Sql_C = mysqli_query($conn,'SELECT * FROM category');

	if(!$Sql_C){
		echo mysqli_error($conn);
	}

?>
<div class="container">
	<div class="panel panel-default">
		<!-- Default panel contents -->
		<div class="panel-heading">Danh sách danh mục</div>
		<div class="panel-body"><a href="add_category.php" class="btn btn-success">Thêm mới danh mục</a></div>
		<!-- Table -->
		<form action="" method="">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($Sql_C as $key => $cate) : ?>
						<tr>
							<td><?php echo $key+1; ?></td>
							<td><a href="product.php?id=<?php echo $cate['id']; ?>"><?php echo $cate['name']; ?></a></td>
							<td><?php echo $cate['status']; ?></td>
							<td><a href="delete_category.php?id= <?php echo $cate['id']; ?>" class= "btn btn-success"> Xóa</a>
								<a href="update_category.php?id=<?php echo $cate['id']; ?>" class= "btn btn-success"> Sửa</a>
							</td>
						</tr>
					<?php endforeach; ?>
					
				</tbody>
			</table>
		</form>
		<div class="panel-footer">
				<a href="index.php" class="btn btn-primary">Quay lại trang chủ</a>
		</div>
	</div>
</div>
