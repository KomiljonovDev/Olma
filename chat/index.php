<?php
	include_once '../cabinet/cabinet.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../assets/styles/main.css">
    <style type="text/css">
    	body {
				flex-direction: column !important;
    	}
    </style>
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
        <a href="../cabinet/">
          <i class="fa-regular fa-user"></i>
          Mening profilim
        </a>
      </li>

      <li>
        <a href="../login/login.php?do=announce" class="add__btn">
          E'lon Berish
        </a>
      </li>

    </ul>

    <div class="toggles" id="bar">		
      <i class="fa-solid fa-bars toggle"></i>
    </div>
  </nav>
</header>
	<div class="body" style="height:auto!important;">
		<div class="container">
			<div class="row chatTemp mt-1 mb-1">
				<div class="col">
					
						<div class="row userHead">
							<div class="to">
								<i class="fa-solid fa-circle-user fs-1" style="font-size: 50px !important; margin-left: 10px; margin-right: 5px;"></i>
								<h5 id="userFullName"><?php echo $selectAll["name"];?></h5>
							</div>
						</div>
						<a href="./group.php?chat_id=7777777" class="text-dark text-decoration-none">
						<div class="row userList" style="background: #f2f2f2; z-index: 999!important;">
							<div class="to">
								<i class="fa-solid fa-user-group fs-2" style="margin-left: 10px; margin-right: 5px;"></i>
								<h5>Olma Group</h5>
							</div>
						</div>
						</a>
					<div id="OlmaUsers" style="overflow-y: scroll; border-radius: 10px; height: 600px;">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	xhr = new XMLHttpRequest();
	xhr.open('POST', '../api/chat/?do=getUsers',true);
	xhr.onload = () =>{
		if (xhr.status === 200) {
			const result = JSON.parse(xhr.responseText);
			if (result.result) {
				users = '';
				result.result.forEach((element) => {
					users += `<div style="overflow-y: scroll; border-radius: 10px;">
						<a href="./chat.php?chat_id=${element.chat_id}" class="text-dark text-decoration-none">
							<div class="row userList">
								<div class="to">
									<i class="fa-solid fa-circle-user fs-1" style="margin-left: 10px; margin-right: 5px;"></i>
									<h6>${element.name}</h6>
								</div>
							</div>
						</a>
					</div>`;
				});
				document.getElementById('OlmaUsers').innerHTML = users;
			}
		}
	}
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(`user_id=${<?php echo $unique_id; ?>}`);

	setInterval(function(argument) {
		xhr = new XMLHttpRequest();
		xhr.open('POST', '../api/chat/?do=getUsers',true);
		xhr.onload = () =>{
			if (xhr.status === 200) {
				const result = JSON.parse(xhr.responseText);
				if (result.result) {
					users = '';
					result.result.forEach((element) => {
						users += `<a href="./chat.php?chat_id=${element.chat_id}" class="text-dark text-decoration-none">
								<div class="row userList">
									<div class="to">
										<i class="fa-solid fa-circle-user fs-1" style="margin-left: 10px; margin-right: 5px;"></i>
										<h6>${element.name}</h6>
									</div>
								</div>
							</a>`;
					});
					document.getElementById('OlmaUsers').innerHTML = users;
				}
			}
		}
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(`user_id=${<?php echo $unique_id; ?>}`);
	}, 5000);
</script>
</html>