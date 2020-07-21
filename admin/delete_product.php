<?php 
	require('../config/connect.php'); 
	$id = isset($_GET['id']) ? $_GET['id'] : 0; 
	// $category_id = isset($_GET['category_id']) ? $_GET['category_id'] : 0; 
	// $query_pro = mysqli_query($conn, "select * from product category_id = '$category_id' where id = '$id'");

	// echo '<pre>';
	// print_r("select * from product category_id = '$category_id' where id = '$id'");
	// echo '</pre>';

	$que_D = mysqli_query($conn, "DELETE FROM product where id = '$id' ");

	if($que_D){
		header("location:list_product.php");
	}else{
		echo mysqli_error($conn);
	}

?>