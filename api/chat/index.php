<?php
	include '../../php/db.php';
	$result =array('ok'=>false,'code'=>null,'message'=>'','result'=>[]);
	if (isset($_REQUEST['do'])) {
		if ($_REQUEST['do'] == 'getUsers') {
			if (isset($_REQUEST['user_id'])) {
				$user_id = trim($_REQUEST['user_id']);
				if (mysqli_num_rows($user = mysqli_query($conn,"SELECT * FROM users WHERE unique_id='{$user_id}'"))>0) {
					if (mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM users WHERE unique_id!='{$user_id}' AND unique_id!='7777777'"))) {
						foreach ($query as $key => $value) {
							$result['result'][] = array('name' => $value['name'], 'chat_id' => $value["unique_id"]);
						}
						$user = mysqli_fetch_assoc($user);
						$result['user'] = array('name' => $user['name'], 'user_id' => $user['unique_id']);
						$result['ok'] = true;
						$result['code'] = 200;
						$result['message'] = 'users found';
					}else{
						$result['code'] = 405;
						$result['message'] = 'users not found';
					}
				}else{
					$result['code'] = 402;
					$result['message'] = 'invalid user_id';
				}
			}else{
				$result['code'] = 403;
				$result['message'] = 'user id not found';
			}
		}else if($_REQUEST['do'] == 'getMessages'){
			if (isset($_REQUEST['user_id'])) {
				if (isset($_REQUEST['chat_id'])) {
					$user_id = trim($_REQUEST['user_id']);
					$chat_id = trim($_REQUEST['chat_id']);
					if (mysqli_num_rows($chat = mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$chat_id}'"))>0) {
						if (mysqli_num_rows($user = mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$user_id}'"))>0) {
							if (mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM messages WHERE (incoming_id='{$user_id}' AND outgoing_id='{$chat_id}') OR (incoming_id='{$chat_id}' AND outgoing_id='{$user_id}')"))>0) {
								foreach ($query as $key => $value) {
									if ($value["incoming_id"] == $user_id) {
										$result['result'][] = array('user'=>'me','message'=>$value["message"]);
									}else{
										$result['result'][] = array('user'=>'you','message'=>$value["message"]);
									}
								}
								$chat = mysqli_fetch_assoc($chat);
								$result['ok'] = true;
								$result['code'] = 200;
								$result['message'] = 'chat and message found';
								$result['user'] = array('name' => $chat['name'], 'user_id' => $chat['unique_id']);
							}else{
								$chat = mysqli_fetch_assoc($chat);
								$result['ok'] = true;
								$result['code'] = 407;
								$result['message'] = 'message not found';
								$result['user'] = array('name' => $chat['name'], 'user_id' => $chat['unique_id']);
							}
						}else{
							$result['ok'] = false;
							$result['code'] = 405;
							$result['message'] = 'invalid user_id';
						}
					}else{
						$result['ok'] = false;
						$result['code'] = 405;
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
		}else if($_REQUEST['do'] == 'sendMessage'){
			if (isset($_REQUEST['user_id'])) {
				if (isset($_REQUEST['chat_id'])) {
					$user_id = rStr(trim($_REQUEST['user_id']));
					$chat_id = rStr(trim($_REQUEST['chat_id']));
					$message = rStr(html(trim($_REQUEST['message'])));
					$type = 'private';
					$type = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users WHERE unique_id='{$user_id}'")) ? $type : 'group';
					$date = strtotime('now');
					if (mysqli_query($conn,"INSERT INTO messages (incoming_id,outgoing_id,message,type,message_date) VALUES ('{$user_id}', '{$chat_id}', '{$message}', '{$type}', '{$date}')")) {
						$result['ok'] = true;
						$result['code'] = 200;
						$result['message'] = 'message successfuly inserted';
						$result['result'][] = array('user_id' => $user_id, 'chat_id' => $chat_id, 'message' => $message, 'date' => $date, 'type' => $type);
					}else{
						$result['ok'] = false;
						$result['code'] = 500;
						$result['message'] = 'set interval error';
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