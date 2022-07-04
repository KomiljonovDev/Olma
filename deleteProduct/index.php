<?php
	require '../cabinet/cabinet.php';
	if ($_REQUEST['do'] == "cancel") {
		if (isset($_REQUEST["product_id"])) {
			$product_id = rStr(trim($_REQUEST['product_id']));
			$date = strtotime('next month');
			if (mysqli_query($conn,"UPDATE product SET product_date='{$date}' WHERE id='{$product_id}'")) {
				echo "E`lonni o`chirish muddati uzaytirildi! \n\nE`lonni o`chish vaqti: " . date('Y:m:d:H:i', $date);
			}else{
				echo "Ochmadi";
			}
		}else{
			echo "product_id not found!";
		}
	}else if($_REQUEST['do'] == "deleteProduct"){
		if (isset($_REQUEST['product_id'])) {
			$product_id = rStr(trim($_REQUEST['product_id']));
			if (mysqli_query($conn,"DELETE FROM product WHERE id='{$product_id}'")) {
				echo "E`lon o`chirildi!";
			}else{
				echo "Ochmadi";
			}
		}else{
			echo "product_id not found!";
		}
	}
?>