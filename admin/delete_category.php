<?php 
	require('../config/connect.php');

	if(isset($_GET['id'])){
		$ID = $_GET['id'];
		
		$que_D = mysqli_query($conn, "DELETE FROM category where id = '$ID' ");
		if($que_D){
			header('location:category.php?id=');
		}else{
			echo mysqli_error($conn);
		}
	}
?>