<?php
	session_start();
	require '../php/db.php';
	if (isset($_REQUEST['do'])) {
		if ($_REQUEST['do'] == 'signup') {
			if ($_REQUEST["fullname"] && $_REQUEST["login"] && $_REQUEST["mail"] && $_REQUEST["pass"] && $_REQUEST["phone"]) {
				$login = rStr(trim($_REQUEST['login']));
				$mail = rStr(trim($_REQUEST['mail']));
				$phone = rStr(trim($_REQUEST['phone']));
				$fullname = rStr(trim($_REQUEST['fullname']));
				$pass = md5(rStr(trim($_REQUEST['pass'])));
				if (!mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE mail='{$mail}'"))) {
					if (!mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE login='{$login}'"))) {
						$rand = rand(time(), 10000);
						$confirm = rand(0,10000);
						$date = strtotime('now');
						if (mysqli_query($conn,"INSERT INTO users (login, name, mail, pass, phone, unique_id, confirm_pass, confirm_pass_date) VALUES ('{$login}', '{$fullname}', '{$mail}', '{$pass}', '{$phone}','{$rand}','{$confirm}','$date')") or die(mysqli_error($conn))) {
							mail($_REQUEST["mail"], 'confirm Code', 'Sizning tasdiqlash parolingiz: ' . $confirm . ' Ushu kodni hech kimga bermang');
							// echo "<h6 style='color:white; margin: 10px;'>" . $confirm . "</h6>";
							?>
							<html lang="en">
							<head>
							    <meta charset="UTF-8">
							    <meta http-equiv="X-UA-Compatible" content="IE=edge">
							    <meta name="viewport" content="width=device-width, initial-scale=1.0">
							    <title>Document</title>
							   		    <!-- Bootstarp -->
							    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
							    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
							</head>
							<body class="bg-dark">
								<center>
									<form action="./login.php?do=confirm" class="col-md-5 bg-light mt-4 p-5" method="POST">
										<h2>Confirm Code</h2>
										<input type="password" name="pass" placeholder="Password" class="form-control m-3">
						                <button class="btn btn-dark form-control m-3">Confirmation</button>
									</form>
								</center>
							        <!-- <div class="container__form container--signin m-auto">
							            <form >
							                <h2 class="form__title">Confirm Code</h2>
							                <input type="password" name="pass" placeholder="Password" class="input" />
							                <label for="checkbox">Eslab qolinsin</label>
							                <input type="checkbox" id="checkbox" name="remember"/>
							                <a href="#" class="link">Forgot your password?</a>
							                <button class="btn">Sign In</button>
							            </form>
							        </div> -->
							    <script src="../assets/js/script.js"></script>
							</body>
							</html>
							<?php
						}else{
							echo "error";
						}
					}else{
						echo "Bunday login avvaldan mavjud!";
					}
				}else{
					echo "Bunday mail avvaldan mavjud!";
				}
			}else{
				echo "Barcha maydonni to`ldiring!";
			}
		}else if($_REQUEST['do'] == 'login'){
			if ($_REQUEST["login"] && $_REQUEST["pass"]) {
				$login = rStr(trim($_REQUEST['login']));
				$pass = md5(rStr(trim($_REQUEST['pass'])));
				if (mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM users WHERE login='{$login}' and pass='{$pass}'"))>0) {
					$row = mysqli_fetch_assoc($query);
					$rand = $row["unique_id"];
					if (isset($_REQUEST['remember'])) {
						if($_REQUEST['remember'] == "on") setcookie('unique_id', $rand, time() + 30 * 24 * 60 * 60);
						$_SESSION['unique_id'] = $rand;
						print_r($_REQUEST);
						sleep(1);
						header('Location: ../cabinet/');
					}else{
						$_SESSION['unique_id'] = $rand;
						header('Location: ../cabinet/');
					}
				}else{
					header('Location: ../cabinet/?action=error&message=Parol+yoki+login+noto\'g\'ri');
				}
			}else{
				header('Location: ../cabinet/?action=error&message=Barcha+maydonni+to`ldiring!');
			}
		}else if($_REQUEST['do'] == 'confirm'){
			if ($_REQUEST["pass"]) {
				$pass = $_REQUEST['pass'];
				if (mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM users WHERE confirm_pass='{$pass}'"))>0) {
					$date = strtotime('now');
					$row = mysqli_fetch_assoc($query);
					if (($row["confirm_pass_date"] - $date) > 300) {
						echo "Ushbui kodning amal qilish muddati tugagan. Iltimos qayta yuboring! <a href='./login.php?do=reset'>Qayta yuborish</a>";
					}else{
						$rand = $row["unique_id"];
						$_SESSION['unique_id'] = $rand;
						header('Location: ../cabinet/?action=success&message=Kabinetga+xush+kelibsiz!');
					}
				}else{
					echo "Confirm parolni tekshirib qaytadan kiriting";
				}
			}else{
				echo "mail ga borgan Parolni kiriting!";
			}
		}else if($_REQUEST['do'] == "announce"){
			if (!isset($_SESSION['unique_id']) && !isset($_COOKIE['unique_id'])) {
				header('Location: ../login/');
			}else{
				$unique_id = rStr($_SESSION['unique_id'] ? $_SESSION['unique_id'] : $_COOKIE['unique_id']);
				if (!mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$unique_id}'"))) {
					$_SESSION['unique_id'] = "";
					setcookie('unique_id','', time()-10);
					header('Location: ../login/');
				}else{
					header('Location: ../cabinet/announce');
				}
			}
		}else if($_REQUEST['do'] == "chat"){
			if (!isset($_SESSION['unique_id']) && !isset($_COOKIE['unique_id'])) {
				header('Location: ../login/');
			}else{
				$unique_id = rStr($_SESSION['unique_id'] ? $_SESSION['unique_id'] : $_COOKIE['unique_id']);
				if (!mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$unique_id}'"))) {
					$_SESSION['unique_id'] = "";
					setcookie('unique_id','', time()-10);
					header('Location: ../login/');
				}else{
					header('Location: ../chat/');
				}
			}
		}
	}else{
		header('Location: ../');
	}

?>