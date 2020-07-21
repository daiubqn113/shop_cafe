<?php require('../config/connect.php'); 

	$ID = !empty($_GET['id']) ? $_GET['id'] : 0;
	$cate= "select * from category where id = '$ID'";
	$query_ca = mysqli_query($conn, $cate);
	$row = mysqli_fetch_assoc($query_ca);
	// print_r($row);

	// print_r($que_ca);
	if(isset($_POST['_name'])){
		$Name = $_POST['_name'];
		$Status = $_POST['_status'];

		$que_U = mysqli_query($conn, "UPDATE category SET name ='$Name' , status ='$Status' WHERE id = '$ID'");

		
		if($que_U){
			header('location: category.php');
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
	<link rel="stylesheet" href="../bootstrap-3.4.1-dist/css/style.css">
</head>
<body>
	<div class="container">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Sửa danh mục</div>
		
			<!-- Table -->
			<form action="" method="POST" class="form" role="form">
				<div class="form-group">
					<label for="_name">Name</label>
					<input type="text" class="form-control" id="_name" name="_name" 
					value="<?php echo $row['name']; ?>">
				</div>
				<div class="radio">
					<label for="an">
						<input type="radio" name="_status" id="an" value="0" checked="checked">
						Ẩn
					</label>
					<label for="hien">
						<input type="radio" name="_status" id="hien" value="1" checked="checked">
						Hiện
					</label>
				</div>
				<button type="submit" name="btn_update" class="btn btn-info">Update</button>
			</form>
		</div>
	</div>

	<script src="../bootstrap-3.4.1-dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../bootstrap-3.4.1-dist/js/jquery.min.js" type="text/javascript"></script>
</body>
</html>