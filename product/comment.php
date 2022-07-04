<?php
	session_start();
	include '../php/db.php';
	if (isset($_REQUEST['do'])) {
		if ($_REQUEST['do'] == "comment") {
			if ($_REQUEST['comment'] && $_REQUEST['product_id']) {
				$product_id = rStr(trim($_REQUEST['product_id']));
				$unique_id = rStr(($_SESSION['unique_id']) ?? $_COOKIE['unique_id']);
				$comment = rStr(trim($_REQUEST['comment']));
				if(mysqli_query($conn,"INSERT INTO comments (product_id,user_id,comment) VALUES ('{$product_id}','{$unique_id}','{$comment}')")){
					header('Location: ./?product_id=' . $_REQUEST['product_id'] . "&action=success&message=Izoh+muoffaqiyatli+joylandi!");
				}else{
					header('Location: ./?product_id=' . $_REQUEST['product_id'] . "&action=error&message=Izoh+joylanmadi!");
				}
			}else{
				if (isset($_REQUEST["product_id"])) {
					header('Location: ./?product_id=' . $_REQUEST['product_id']);
				}else{
					header('Location: ../');
				}
			}
		}
	}

?>