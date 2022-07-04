<?php
	ob_start();
	define('API_KEY', ''); # Your telegram bot token
	
	function bot($method, $datas=[]){
		$url = "https://api.telegram.org/bot".API_KEY."/".$method;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
		$res = curl_exec($ch);

		if (curl_error($ch)) {
			var_dump(curl_error($ch));
		}else{
			return json_decode($res);
		}
	}
	if ($_REQUEST['do'] == "sendMessage") {
		if ($_REQUEST['name'] && $_REQUEST['mail'] && $_REQUEST['subject'] && $_REQUEST['message']) {
			$matn = "Olma sayti foydalanuvchisidan yangi xabar keldi. Ma'lumotlari:\n\nIsm-familya: " . $_REQUEST['name'] . "\nMail: " . $_REQUEST['mail'] . "\nXabar Mavzusi: " . $_REQUEST['subject'] . "\nXabar matni: " . $_REQUEST['message'];
			$matn = ((strlen($matn)<4096) ? $matn : (substr($matn, 0,4093) . "..."));
			$send = bot('sendMessage',[
				'chat_id'=>931026030,
				'text'=>$matn
			]);
			if ($send->ok) {

			}
		}
	}


?>