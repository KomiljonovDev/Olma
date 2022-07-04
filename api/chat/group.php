<?php
	include '../../php/db.php';
	$result =array('ok'=>false,'code'=>null,'message'=>null,'result'=>[]);
	if (isset($_REQUEST['do'])) {
		if($_REQUEST['do'] == 'getMessages'){
			if (isset($_REQUEST['user_id'])) {
				if (isset($_REQUEST['chat_id'])) {
					if ($_REQUEST['chat_id'] == '7777777') {
						$user_id = trim($_REQUEST['user_id']);
						$query = mysqli_query($conn,"SELECT * FROM messages WHERE outgoing_id='7777777'");
						if (mysqli_num_rows($query)>0) {
							$result['ok'] = true;
							$result['code'] = 200;
							$result['message'] = 'chat and message found';
							foreach ($query as $key => $value) {
								$incoming_id = $value['incoming_id'];
								$UserQuery = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE unique_id='{$incoming_id}'"));
								if ($value["incoming_id"] == $user_id) {
									$result['result'][] = array('user'=>'me','message'=>$value["message"],'name'=>$UserQuery['name'],'user_id'=>$UserQuery['unique_id']);
								}else{
									$result['result'][] = array('user'=>'you','message'=>$value["message"],'name'=>$UserQuery['name'],'user_id'=>$UserQuery['unique_id']);
								}
							}
						}else{
							$result['ok'] = true;
							$result['code'] = 200;
							$result['message'] = 'chat found, message not found';
						}
					}else{
						$result['code'] = 403;
						$result['message'] = 'invalid chat_id';
					}
				}else{
					$result['ok'] = false;
					$result['code'] = 403;
					$result['message'] = 'chat not found';
				}
			}else{
				$result['ok'] = false;
				$result['code'] = 402;
				$result['message'] = 'user id not found';
			}
		}
	}else{
		$result['ok'] = false;
		$result['code'] = 403;
		$result['message'] = 'method not found';
	}
	echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_SLASHES);
?>