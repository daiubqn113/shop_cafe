<?php require('../config/connect.php'); 

	$query_ca = mysqli_query($conn, 'SELECT * FROM category');

	$images ='';
	if(!empty($_FILES['_anh']['name'])){
		$f =$_FILES['_anh'];
		if(move_uploaded_file($f['tmp_name'], 'upload_file/'.$f['name'])){
			$images =$f['name'];
		}
	}

	if(isset($_POST['_name'])){
		$Name = $_POST['_name'];
		$Price = $_POST['_price'];
		$PriceSale = $_POST['_priceSale'];
		$CategoryId = $_POST['_categoryId'];

		$sql_pro = "INSERT INTO product(images, name, price, price_sale,category_id) values ('$images', '$Name', '$Price', '$PriceSale','$CategoryId') ";

		$que_P = mysqli_query($conn, $sql_pro);
		// echo $sql_pro;
		if($que_P){
			header('location:product.php?id='.$CategoryId);
		}else{
			echo mysqli_error($conn);
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../bootstrap-3.4.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" hre="../bootstrap-3.4.1-dist/css/style.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Thêm danh mục</div>
			<div class="panel-heading">
			<!-- Table -->
	
			
			<form action="" method="POST" class="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="_anh">Images</label>
					<input type="file" class="form-control" id="_anh" name="_anh">
				</div>
				<div class="form-group">
					<label for="_name">Name</label>
					<input type="text" class="form-control" id="_name" name="_name" placeholder="Nhập tên sản phẩm">
				</div>	
				<div class="form-group">
					<label for="_price">Price</label>
					<input type="text" class="form-control" id="_price" name="_price" placeholder="Nhập giá">
				</div>	
				<div class="form-group">
					<label for="_priceSale">Price Sale</label>
					<input type="text" class="form-control" id="_priceSale" name="_priceSale" placeholder="Giá đã giảm">
				</div>
				<div class="form-group">
					<label for="_categoryId" >Danh mục sản phẩm</label>
					<div class="">
						<select name="_categoryId" id="_categoryId" class="form-control" required="required">

						<?php foreach ($query_ca as $key => $cate) : ?>
							<option value="<?php echo $cate['id'] ?>"><?php echo $cate['name'] ?></option>
						<?php endforeach; ?>

						</select>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" name="btn_add" class="btn btn-info">Thêm</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	

	<script src="../bootstrap-3.4.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../bootstrap-3.4.1-dist/js/jquery.min.js" type="text/javascript"></script>
</body>
</html>