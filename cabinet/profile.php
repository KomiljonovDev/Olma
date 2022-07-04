<?php
	include 'cabinet.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cabinet</title>
	    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"   integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="   crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../assets/styles/main.css">
	<link rel="stylesheet" href="./cabinet.css">
	<link rel="stylesheet" href="../assets/styles/modal.css">
</head>
<body>
	<header>
	  <nav>
	     <a href="../">
		    <div class="logo">
		      <h3>
		      O<span>l</span>m<span class="fs-1">a</span>
		      </h3>
		    </div>
		</a>

	    <ul class="nav-links" id="nav-links">
	      <i class="fa-solid fa-x toggle-x" id="x-bar"></i>

	      <li>
	        <a href="../login/login.php?do=chat">
	          <i class="fa-regular fa-comment"></i> 
	          Chat
	        </a>
	      </li>

	      <li>
	        <a href="../aloqa/index.html">
	          <i class="fa-regular fa-id-badge mx-1"></i>
	          Aloqa
	        </a>
	      </li>

	      <li>
	        <a href="./" class="active">
	          <i class="fa-regular fa-user"></i>
	          Mening profilim
	        </a>
	      </li>

	      <li>
	        <a href="./announce/" class="add__btn">
	          E'lon Berish
	        </a>
	      </li>

	    </ul>

	    <div class="toggles" id="bar">		
	      <i class="fa-solid fa-bars toggle"></i>
	    </div>
	  </nav>
	</header>


	<div class="cabinet">
		<div class="cabinet__left">
			<div class="user__logo">
				<img src="../assets/image/account.png" class="w-100" alt="u">
			</div>

			<div class="user__datas">
				<div class="user__data">
					<span>
						Ism va Familiya:
					</span>

					<span>
	
						<?php echo $selectAll['name']?>
					</span>
				</div>


				<div class="user__data">
					<span>
						Telefon raqam:
					</span>

					<span>
						<?php echo $selectAll['phone']?>
					</span>
				</div>


				<div class="user__data">
					<span>
						Login:
					</span>

					<span>
						<?php echo $selectAll['login']?>
					</span>
				</div>


				<div class="user__data">
					<span>
						Email:
					</span>

					<span>
						<?php echo $selectAll['mail']?>
					</span>
				</div>
			</div>

			<div class="py-3 d-flex justify-content-between">
				<div class="edit__btn btn btn-warning text-white mx-2"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
					<i class="fa-solid fa-user-pen"></i>
					Taxrirlash
				</div>
				<div class="logout__btn fs-6 btn btn-danger mx-2">
					<i class="fa-solid fa-arrow-right-from-bracket"></i>
					<a class="text-white" href="./?do=leave"> Chiqish</a>
				</div>

			</div>
		</div>


		<div class="cabinet__right">
			<div class="my_ads">
				<div class="my__ads__title">
					Mening e'lonlarim
				</div>

				<div class="my_ads">
					<?php
						if (mysqli_num_rows($products)) {
							foreach ($products as $key => $value) {
								echo '<div class="my_ads_item">
							<div class="my_ads_item_img">
								<img src="../uploads/' . $value["img1"] . '" alt="ads">
							</div>
							<div class="my_ads_item_right">
								<div class="my_ads_item_title">
									<a style="text-decoration: none; color: black;" href="../product/?id=' . $value["id"] . '">' . $value["name"] . '</a>
								</div>

								<div class="my_ads_item_des">
									' . $value["description"] . '
								</div>

								<div class="my_ads_item_price">
									' . $value["cost"] . ' so`m
								</div>
							</div>

							<div class="my_ads_item_delete">
							 	<a href="./?do=deleteProduct&product_id=' . $value["id"] . '"><i class="fa-solid fa-trash"></i></a>
							</div>
						</div>';
							}
						}else{
							echo "<h1>Sizda hechqanday elonlar mavjud emas!</h1>";
						}
					?>


					
			</div>
		</div>
	</div>




<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Taxrirlash</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./?do=editProfile" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Ism va Familiya:</label>
            <input type="name" class="form-control" id="recipient-name" name="fullname">
          </div>
          <div class="mb-3">
            <label for="login" class="col-form-label">Login:</label>
            <input type="login" class="form-control" id="login" name="login">
          </div>
		  		<div class="mb-3">
            <label for="pass" class="col-form-label">Telefon raqam:</label>
            <input type="phone" class="form-control" id="pass" name="phone">
          </div>
          <div class="mb-3">
            <label for="pass" class="col-form-label">Mail:</label>
            <input type="email" required class="form-control" id="pass" name="mail">
          </div>
          <div class="mb-3">
            <label for="pass" class="col-form-label">Joriy Parol:</label>
            <input type="password" class="form-control" id="pass" name="old_pass">
          </div>
          <div class="mb-3">
            <label for="pass" class="col-form-label">Yangi Parol:</label>
            <input type="password" class="form-control" id="pass" name="new_pass">
          </div>
			  	<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yopish & Bekor qilish</button>
		        <button type="submit" class="btn btn-primary">Saqlash</button>
		      </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div id="getTextModal" class="modal__">
  <div class="modal__content">
    <span class="close__modal__btn">&times;</span>
    <div id="getTextModalText"></div>
  </div>

</div>

<script>
	function getGet(name) {
	    var s = window.location.search;
	    s = s.match(new RegExp(name + '=([^&=]+)'));
	    return s ? s[1] : false;
	}


	const  Desc1Item = document.querySelectorAll('.my_ads_item_des');
	Desc1Item.forEach(e => {
		let innText = e.innerText.slice(0,120)+'...'
		e.innerText = innText
	})
	// Desc1Item.innerText.slice(0,120)+'...'


	if (getGet('message')!==false) {			
		let getText = '';

		let forEachGet = getGet('message').split('+');
		forEachGet.forEach((e) => {
			getText += e + ' '
		});


		getText = getText.replace('%27','\'');
		getText = getText.replace('%27','\'');
		getText = getText.replace('%27','\'');


		const getTextModalText = document.getElementById('getTextModalText');
		const getTextModal = document.getElementById('getTextModal');
		getTextModal.style="display: block !important;"
		if (getGet('action')) {
			getTextModalText.innerHTML = getGet('action') == 'success' ? `<h1 class="text-center text-success fw-bold display-6">${getText}</h1>` : `<h1 class="text-center text-danger fw-bold display-6">${getText}</h1>`
		} else {
			getTextModalText.innerHTML = `<h1 class="text-center text-danger fw-bold display-6">${getText}</h1>`;
		}



		var modal = document.getElementById("getTextModal");


		var span = document.getElementsByClassName("close__modal__btn")[0];


		span.onclick = function() {
		    location.href = './profile.php';
		}

		window.onclick = function(event) {
		  if (event.target == modal) {
		    location.href = './profile.php';
		  }
		}


	    setTimeout(() => {
	        location.href = './profile.php';
	    }, 4000);
	}


</script>


</body>
</html>