<?php
	$host = 'localhost';
	$user = 'appkey_olma';
	$password = '54[~J-p#*9rB';
	$dbname = 'appkey_olma';
	$conn = mysqli_connect($host,$user,$password,$dbname);

	function rStr($text) {
		global $conn;
		return mysqli_real_escape_string($conn, $text);
	}
	date_default_timezone_set('Asia/Tashkent');
	function html($tx){
        return str_replace(['<','>'],['&#60;','&#62;'],$tx);
    }
?>