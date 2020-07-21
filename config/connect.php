<?php 
	$conn = mysqli_connect('localhost','root','','cafe_shop');

	if (!$conn) {
		echo mysqli_error($conn);
	}else{
		mysqli_set_charset($conn,'utf8');
	}


 ?>