<?php
	$data = array('ok'=>false,'code'=>null,'message'=>null,'result'=>[]);
	if (isset($_REQUEST['do'])) {
		include '../php/db.php';
		if ($_REQUEST['do'] == 'getProduct') {
			if (mysqli_num_rows($query = mysqli_query($conn, "SELECT * FROM product WHERE id>'0' LIMIT 1000"))>0) {
				$arr = array();
				$result = array();
				foreach ($query as $key => $value) $arr[] = $value;
				$i = 0;
				foreach ($arr as $key => $value) {
					$i++;
					$index = array_rand($arr);
					$result[] = $arr[$index];
					if ($i == 9) {
						break;
					}
				}
				function arrSort($arr1, $arr2) {
					return  $arr2['view'] <=> $arr1['view'];
				}
				usort($result, 'arrSort');
				$data['ok'] = true;
				$data['code'] = 200;
				$data['message'] = 'product count: ' . count($result);
				$data['result'] = $result;
			}
		}
	}
	echo json_encode($data);
?>