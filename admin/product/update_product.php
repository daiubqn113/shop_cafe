<?php require('../../config/connect.php'); 
	$id = isset($_GET['id']) ? $_GET['id'] : 0;

	$query_P = mysqli_query($conn, "SELECT * FROM product where id =" .$id);
	$pro = mysqli_fetch_assoc($query_P);
	// echo '<pre>';
	// print_r($pro);
	// echo '</pre>';
	$images = $pro['images'];
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

		$pro_U = "UPDATE product SET name = '$Name', price = '$Price', price_sale = '$PriceSale', category_id = '$CategoryId', images = '$images' where id = $id";

		$query_pro_U = mysqli_query($conn, $pro_U);
		// echo $sql_pro;
		if($query_pro_U){
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
			<div class="panel-heading">Sửa sản phẩm</div>
			<div class="panel-heading">
			<!-- Table -->
	
			
			<form action="" method="POST" class="form" enctype="multipart/form-data">
				<div class="form-group">
					<label for="_anh">Images</label>
					<input type="file" class="form-control" id="_anh" name="_anh">
					<img src="upload_file/<?php echo $pro['images']?>" alt="" width = "120px">
				</div>
				<div class="form-group">
					<label for="_name">Name</label>
					<input type="text" class="form-control" id="_name" name="_name" value="<?php echo $pro['name'] ?>">
				</div>	
				<div class="form-group">
					<label for="_price">Price</label>
					<input type="text" class="form-control" id="_price" name="_price" value="<?php echo $pro['price'] ?>">
				</div>	
				<div class="form-group">
					<label for="_priceSale">Price Sale</label>
					<input type="text" class="form-control" id="_priceSale" name="_priceSale" pvalue="<?php echo $pro['price_sale'] ?>">
				</div>
				<?php $query_Ca = mysqli_query($conn,"SELECT * FROM category");
					// echo '<pre>';
					// print_r($query_Ca);
					// echo '</pre>';
				 ?>
				<div class="form-group">
					<label for="_categoryId" >Danh mục sản phẩm</label>
					<div class="">
						<select name="_categoryId" id="_categoryId" class="form-control" required="required">
	
						<?php foreach ($query_Ca as $key => $cate) : ?>
							<?php $selected  = $pro['category_id'] == $cate['id'] ? 'selected' : ''; ?>
							<option <?php echo $selected; ?> value="<?php echo $cate['id'] ?>"><?php echo $cate['name']; ?></option>
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