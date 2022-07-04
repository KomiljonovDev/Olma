<?php
	include '../cabinet/cabinet.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chat</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" type="text/css" href="../assets/styles/main.css">
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
	<div class="py-3">
		
	</div>
	<div class="container">
		<div class="row chatTemp mt-1 mb-1">
			<div class="col">
				<div class="row head p-2">
					<div class="to">
						<a href="./" class="text-secondary"><i class="fa-solid fa-arrow-left fs-5"></i></a>
						<i class="fa-solid fa-user-group fs-2" style="margin-left: 10px; margin-right: 5px;"></i>
						<h5><b>O L M A Group</b></h5>
					</div>
					
				</div>
				<div class="row body">
					<div class="message position-relative" id="messageBox">
 						
					</div>
				</div>
				<div class="row footer">
					<form class="d-flex mt-2">
						<input type="text" class="form-control inp" style="outline: none;" placeholder="Type a message here" id="message">
						<input hidden id="chat_id" value="<?php echo(trim($_REQUEST['chat_id'] ?? null)); ?>">
						<input hidden id="user_id" value="<?php echo(trim($unique_id)); ?>">
						<button id="sendMessage" type="submit" class="bg-dark"><i class="fa-solid fa-paper-plane mb-3"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script type="text/javascript">
	function scrollToBottom() {
		chatBox.scrollTop = chatBox.scrollHeight;
	}
	function getMessages() {
		chatBox = document.getElementsByClassName("body")[0];
		xhr = new XMLHttpRequest();
		xhr.open('POST', '../api/chat/group.php?do=getMessages',true);
		xhr.onload = () =>{
			if (xhr.status === 200) {
				const result = JSON.parse(xhr.responseText);
				if (result.ok == true) {
					if (result.result.length > 0) {
						msg = '';
						result.result.forEach((argument)=>{
							if (argument.user == 'you') {
								msg += `<div class="w-100 my-2" style="clear: both;">
		 							<a href="./chat.php?chat_id=${argument.user_id}"><i class="fa-solid fa-circle-user fs-2 text-dark" style="margin-left: 10px; margin-right: 5px;"></i></a><div class="toMe badge bg-white text-dark text-wrap mt-2 p-2" style="max-width: 15rem;font-size: 15px; text-align: left; border-radius: 10px 0 10px 0;">
									<span class="text-secondary" style="font-size: 13px; position: relative; bottom: 5px !important;">${argument.name}</span><br>${argument.message}!</div>
		 						</div>`;
							}else{
								msg += `<div class="w-100" style="clear: both;">
 							<div class="chat-message bg-dark text-white p-2 my-1" style="float: right;max-width: 20rem; font-size: 15px; text-align: left; border-radius: 0 10px 0 10px;">${argument.message}</div>
 						</div>`
							}
						});
					}else{
						msg = `<center class="mt-5">${result.message}</center>`;
					}
				}else{
					msg = `<center class="mt-5">${result.message}</center>`;
				}
				document.getElementById('messageBox').innerHTML = msg;
				scrollToBottom();
			}
			console.log(xhr.responseText);
		}
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(`user_id=${<?php echo $unique_id; ?>}&chat_id=${<?php echo trim($_REQUEST['chat_id']); ?>}`);
	}
	getMessages();

	setInterval(function () {
		getMessages();
		scrollToBottom();
	},5000);


	const form = document.getElementsByTagName('form'),
		chat_id = document.getElementById('chat_id'),
		user_id = document.getElementById('user_id'),
		sendMessage = document.getElementById('sendMessage'),
		messageBox = document.getElementById('messageBox'),
		messages = document.getElementById('message');
	sendMessage.onclick = () =>{

		event.preventDefault();
		userid = user_id.value.trim();
		chatid = chat_id.value.trim();
		message = messages.value.trim();
		document.querySelector('.inp').value = "";
		if (userid && chatid && message) {

			xhr = new XMLHttpRequest();
			xhr.open('POST', '../api/chat/?do=sendMessage', true);
			xhr.onload = () =>{
				if (xhr.status === 200) {
				}
			}
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(`user_id=${userid}&chat_id=${chatid}&message=${message}`);
		}
		getMessages();
		scrollToBottom();
	}
	
</script>
</html>