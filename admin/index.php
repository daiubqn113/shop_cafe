<?php include 'header.php'; ?>

	<div class="container">
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="panel panel-default">
				<div class="nav navbar-inverse">
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="category.php">Danh sách danh mục</a></li>
					<li><a href="list_product.php">Danh sách sản phẩm</a></li>
					<li><a href="#">Danh sách hóa đơn</a></li>
				</div>
			</div>
		</div>
		<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Thêm</h3>
				</div>
				<div class="panel-body">
					<div class=" nav">
						<li ><a href="add_category.php">Thêm mới danh mục</a></li>
						<li><a href="add_product.php">Thêm mới sản phẩm</a></li>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php include 'footer.php'; ?>