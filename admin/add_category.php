<?php require('../config/connect.php'); 
	include ('header.php');
	if(isset($_POST['_name'])){
		$Name = $_POST['_name'];
		$Status = $_POST['_status'];

		$que_C = mysqli_query($conn, "INSERT INTO category(name, status) values ('$Name', '$Status') ");
		if($que_C){
			header('location:category.php');
		}else{
			echo mysqli_error($conn);
		}
	}
?>


	<div class="container">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">Thêm danh mục</div>
		
			<!-- Table -->
			<form action="" method="POST" class="form" role="form">
				<div class="form-group">
					<label for="_name">Name</label>
					<input type="text" class="form-control" id="_name" name="_name" placeholder="Input field">
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
				<button type="submit" name="btn_add" class="btn btn-info">Thêm</button>
			</form>
		</div>
	</div>

