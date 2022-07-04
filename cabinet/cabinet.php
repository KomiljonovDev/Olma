<?php
	include '../php/db.php';
	session_start();
	$selectAll;
	if (isset($_SESSION['unique_id']) || isset($_COOKIE['unique_id'])) {
		if (isset($_SESSION['unique_id'])) {
			$unique_id = $_SESSION['unique_id'];
		}else{
			$unique_id = $_COOKIE['unique_id'];
		}
		$query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$unique_id}'");
		if (!mysqli_num_rows($query)) {
			$_SESSION['unique_id'] = "";
			setcookie('unique_id','', time()-10);
			header('Location: ../login/');
		}else{
			$selectAll = mysqli_fetch_assoc($query);
			$products = mysqli_query($conn, "SELECT * FROM product WHERE user_id='{$unique_id}'");
		}
	}else{
		header('Location: ../login/');
	}
?>