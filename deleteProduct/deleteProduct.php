<?php
	require '../php/db.php';
	if (isset($_REQUEST['deleteProduct'])) {
		$allowDATE = 7776000;
		if (mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM product WHERE id>'0'"))>0) {
			foreach ($query as $key => $value) {
				if (($value["product_date"] - strtotime('now')) <= 0) {
					$product_id = $value["id"];
					if (mysqli_query($conn,"DELETE FROM product WHERE id='{$product_id}'")) {
						echo "Ochirildi!";
					}else{
						echo "O`chmadi!";
					}
				}else{
					echo date('Y:m:d:H:i', $value["product_date"]) . " Sanada ochadi!";
				}
			}
		}else{
			echo "O`chirish uchun hechqanday product mavjud emas!";
		}
	}
?>