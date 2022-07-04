<?php
	include './cabinet.php';
	if (isset($_REQUEST['do'])) {
		if ($_REQUEST['do'] == "editProfile") {
			if ($_REQUEST['fullname'] && $_REQUEST['login'] && $_REQUEST['phone'] && $_REQUEST['mail'] && $_REQUEST['old_pass'] && $_REQUEST['new_pass']) {
				$oldPass = md5(rStr(trim($_REQUEST['old_pass'])));
				if (mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM users WHERE unique_id='{$unique_id}' AND pass='{$oldPass}'"))>0) {
					$fullname = rStr(trim($_REQUEST['fullname']));
					$login = rStr(trim($_REQUEST['login']));
					$phone = rStr(trim($_REQUEST['phone']));
					$mail = rStr(trim($_REQUEST['mail']));
					$newPass = md5(rStr(trim($_REQUEST['new_pass'])));
					if (mysqli_query($conn,"UPDATE users SET login='{$login}', name='{$fullname}', mail='{$mail}', pass='{$newPass}', phone='{$phone}' WHERE unique_id='{$unique_id}'")) {
						header('Location: ./profile.php');
					}else{
						echo false;
					}
				}else{
					header('Location: ./profile.php?action=error&message=Joriy+parol+xato');
				}
			}else{
				header('Location: ./profile.php?action=error&message=Barcha+maydonlarni+toldiring');
			}
		}else if ($_REQUEST['do'] == 'leave') {
			$_SESSION['unique_id'] = "";
			session_destroy();
			setcookie('unique_id','.', time()+110);
			setcookie('unique_id','', time()-110);
			header('Location: ../');
		}else if($_REQUEST['do'] == "deleteProduct"){
			if (isset($_REQUEST['product_id'])) {
				$product_id = trim($_REQUEST['product_id']);
				if (mysqli_query($conn, "DELETE FROM product WHERE id='{$product_id}'")) {
					header('Location: ./profile.php?action=success&message=E\'lon+o\'chirildi.');
				}else{
					header('Location: ./profile.php?action=error&message=E\'lon o\'chirishda xato yuzaga keldi!.');
				}
			}else{
				header('Location: ./profile.php?action=error&message=E\'lon topilmadi.');
			}
		}else if($_REQUEST['do'] == "announce"){
			if ($_REQUEST['name'] && $_REQUEST['cost'] && $_FILES['img'] && $_FILES['img1'] && $_FILES['img2'] && $_REQUEST['desc'] && $_REQUEST['location'] && $_REQUEST['phone']) {
				$allowed = array('png','jpg');
				$filename = $_FILES['img']['name'];
				$filename1 = $_FILES['img1']['name'];
				$filename2 = $_FILES['img2']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$ext1 = pathinfo($filename1, PATHINFO_EXTENSION);
				$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
				if (in_array($ext, $allowed) && in_array($ext1, $allowed) && in_array($ext2, $allowed)) {
					$img = rStr($_FILES['img']['name']);
					$img1 = rStr($_FILES['img1']['name']);
					$img2 = rStr($_FILES['img2']['name']);
					if (file_exists('../uploads/' . $img)) {
						$img = ((rand(time(), 10000)) . "-" . $img);
					}
					move_uploaded_file($_FILES['img']['tmp_name'], "../uploads/" . $img);
					if (file_exists('../uploads/' . $img1)) {
						$img1 = ((rand(time(), 10000)) . "-" . $img1);
					}
					move_uploaded_file($_FILES['img1']['tmp_name'], "../uploads/" . $img1);
					if (file_exists('../uploads/' . $img2)) {
						$img2 = ((rand(time(), 10000)) . "-" . $img2);
					}
					move_uploaded_file($_FILES['img2']['tmp_name'], "../uploads/" . $img2);
					$name = rStr(trim($_REQUEST['name']));
					$cost = rStr(trim($_REQUEST['cost']));
					$desc = rStr(trim($_REQUEST['desc']));
					$location = rStr(trim($_REQUEST['location']));
					$phone = rStr(trim($_REQUEST['phone']));
					if (isset($_REQUEST['delivery'])) {$delivery = '1';}else{$delivery = '0';}
					$date = strtotime('now');
					if (mysqli_query($conn,"INSERT INTO product (user_id,name,cost,description,location,phone,img,img1,img2,delivery,product_date,sold,view) VALUES ('{$unique_id}','{$name}','{$cost}','{$desc}','{$location}','{$phone}','{$img}','{$img1}','{$img2}','{$delivery}','{$date}','0','0')") or die(mysqli_error($conn))) {
						header('Location: ./profile.php?action=success&message=E\'loningiz+muoffaqiyatli+joylandi!');
					}else{
						header('Location: ./profile.php?action=error&message=Texnik+xatolik!');
					}
				}else{
					header('Location: ./profile.php?action=error&message=Fayl+formati+noto\'g\'ri');
				}
			}else{
				header('Location: ./profile.php?action=error&message=Barcha+maydonlarni+to\'ldiring');
			}
		}
	}else{
		header('Location: ./profile.php?action=emptyDo');
	}
?>