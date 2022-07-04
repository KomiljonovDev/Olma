<?php
  session_start();
  require '../php/db.php';
  if (isset($_REQUEST["product_id"])) {
      $product_count = (($product_count = mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM product WHERE (rand() AND sold!='1') ORDER BY view DESC")))>0) ? $product_count : "Bir necha";
      if (($product_id = ($_REQUEST['product_id']) ?? $product_id = null)){
        $product = mysqli_fetch_assoc((mysqli_query($conn, "SELECT * FROM product WHERE id='{$product_id}'"))); $unique_id = $product["user_id"]; $user = mysqli_fetch_assoc((mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$unique_id}'")));
      }
  }else{
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <!-- css file -->
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="../assets/styles/main.css">
    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"   integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="   crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            Xabarlar
          </a>
        </li>
  
        <li>
          <a href="../aloqa/">
            <i class="fa-regular fa-id-badge mx-1"></i>
            Aloqa
          </a>
        </li>
  
        <li>
          <a href="../login/">
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
  
  <!-- .search__bar__input -->
  <div class="search__bar">
    <form action="../" method="get">
      <div class="search__bar__main">
        <div class="search__bar__input">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" name="search" placeholder="<?php echo $product_count; ?> e'lonlar yoningizda">
        </div>
        <button class="border-0" type="submit" style="background: none;">
        <a class="search__bar__input">
          Qidiruv
          <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        </button>
      </div>
    </form>
  </div>


<div class="container mt-2">
    <div class="row">
      <div class="col-md-8">
        <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="../uploads/<?php echo $product["img"]; ?>" alt="Los Angeles" class="d-block" style="width:100%">
  </div>
  <div class="carousel-item">
    <img src="../uploads/<?php echo $product["img1"]; ?>" alt="Chicago" class="d-block" style="width:100%">
  </div>
  <div class="carousel-item">
    <img src="../uploads/<?php echo $product["img2"]; ?>" alt="New York" class="d-block" style="width:100%">
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>
      </div>
        <div class="col-md-4 mt-2">
            <div class="vendor">
                <b>Foydalanuvchi</b>
                <p class="vendorName"><?php echo $user["name"]; ?></p>
                <div class="btnDiv m-2">
                    <a class="btn btn-outline-dark m-2" href="tel://<?php echo $product["phone"]; ?>">Telefon nomer</a>
                    <a class="btn btn-outline-dark m-2" href="mailto://<?php echo $user["mail"]; ?>">MAIL</a>
                </div>
            </div>
            <div class="location mt-5">
                <b>Manzil</b>
                <p><?php echo str_replace("\n", "<br/>", $product["location"]); ?></p>
                <img src="../assets/image/loaction.svg" alt="">
            </div>
        </div>
    </div>

    <!-- Comment start -->

    <div class="container">
    <div class="row mb-2">
        <div class="col-md-12 cardComment mt-5">
            <i><?php echo date('Y',$product["product_date"]) . "-yil "; echo ((date('d',$product["product_date"]))/10*10) . "-";echo str_replace(["Jan",'Feb','Mar','Apr','May','Jun','Jul','Avg','Sep','Oct','Nov','Dec'],['Yanvar','Fevral','Mart','Aprel','May','Iyun','Iyul','Avgust','Sentabr','Oktabr','Noyabr','Dekabr'],date('M',$product["product_date"])); echo "   " . date('H',$product["product_date"]) . ":" . date('i',$product["product_date"]);?> da e`lon joylangan!</i>
            <p><h4><?php echo $product["name"]; ?></h4></p>
            <b><h1 class="mb-3"><?php echo $product["cost"] ?> so`m</h1></b>
            <h5 class="mt-3"><b>TAVSIF</b></h5>
            <p><?php echo $product["description"] ?></p>
        </div>
    </div>
    <?php
    if (isset($_SESSION['unique_id'])) {
        $unique_id = rStr($_SESSION['unique_id']);
    }else{
      $unique_id = null;
    }
      if($unique_id) $comment_user = mysqli_fetch_assoc((mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$unique_id}'")));
    ?>
    <div class="row mt-4">
        <div class="col-md-12 cardComment">
            <b>Foydalanuvchi</b>
            <p><?php echo $user_comment = $comment_user["name"] ?? "Olma foydalanuvchisi"; ?></p>
            <form action="comment.php?do=comment" method="POST">
                <div class="form-floating">
                    <textarea style="height: 200px;" class="form-control textAreaComment" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="comment"></textarea>
                    <label for="floatingTextarea2">Xabar yuborish</label>
                    <input type="" name="product_id" value="<?php echo $product_id; ?>"hidden>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <input type="submit" class="btn btn-dark mt-2" value="Yuborish">
                </div>
            </form>
        </div>
    </div>
    <?php
          $comments = ((mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM comments WHERE product_id='{$product_id}'"))>0) ?? null);
        ?>
    <div class="row mt-3">
      <?php
          if ($comments) {
            ?>
            <h3>Bu e`lon uchun sharhlar: </h3>
            <div class="col-md-12 cardComment commentDiv">
            <?php
              foreach ($query as $key => $value) {
                $user_id = (($value["user_id"]) ?? null);
                if($user_id) ($comment_user = mysqli_fetch_assoc((mysqli_query($conn, "SELECT * FROM users WHERE unique_id='{$user_id}'")))) ?? null;
                echo '<h5>' . ($comment_user["name"] ?? "Olma foydalanuvchisi"). '</h5>';
                echo '<li>' . $value["comment"] . '</li><br/>';
              }
            ?>
            </div>
      <?php
          }
      ?>
      
      
    </div>
    </div>
</div>

    <!-- Comment end -->

    <!-- smilarCards start -->
    <div class="container mt-5 mb-2">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <?php
            $product_name = trim($product["name"]);
            $product_location = trim($product["location"]);
            $product_cost = trim($product["cost"]);
            $product_user_id = trim($product["user_id"]);
            $like = (mysqli_query($conn, "SELECT * FROM product WHERE (((name LIKE '%{$product_name}%') || (location LIKE '%{$product_location}%') || (cost LIKE '%{$product_cost}%') || (user_id LIKE '%{$product_user_id}%')) || 1=1) LIMIT 6"));
            foreach ($like as $key => $value) {
              echo '<a style="text-decoration:none; color: black;" href="./?product_id=' . $value["id"] .'"><div class="col">
              <div class="card h-100">
                <img src="../uploads/' . $value["img1"] . '" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">' . $value["name"] . '</h5>
                  <p class="card-text">' . $value["description"] . '</p>
                  <p class="card-text"><b>' . $value["cost"] . ' so`m</b></p>
                </div>
              </div>
            </div></a>';
            }
          ?>
            
        </div>
    </div>
    <!-- smilarCards end -->



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
        location.href = './?product_id='+getGet('product_id');
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        location.href = './?product_id='+getGet('product_id');
      }
    }

    setTimeout(() => {
        location.href = './?product_id='+getGet('product_id');
    }, 4000);
  }
</script>
<!-- <script src="../assets/js/comment.js"></script> -->
</body>
</html>
<?php
	if (isset($_SESSION['product_id'])) {
		if ($_SESSION['product_id'] !== trim($_REQUEST['product_id'])) {
			$view_date = $_SESSION['product_view_date'] ? $_SESSION['product_view_date'] : 0;
			if (((strtotime('now') - $view_date)>1800) || $_SESSION['product_id'] !== trim($_REQUEST['product_id'])) {
				$product_id = trim($_REQUEST['product_id']);
				if (mysqli_query($conn,"UPDATE product SET view = view+'1' WHERE id='{$product_id}'")) {
					echo 'success';
					$_SESSION['product_id'] = $product_id;
					$_SESSION['product_view_date'] = strtotime('now');
				}else{
					echo 'xatolik';
				}
			}else{
				echo '30 daqiqa';
			}
		}else{
			echo 'osha sahifa';
		}
	}else{
		$product_id = trim($_REQUEST['product_id']);
		if (mysqli_query($conn,"UPDATE product SET view = view+'1' WHERE id='{$product_id}'")) {
			echo 'success';
			$_SESSION['product_id'] = $product_id;
			$_SESSION['product_view_date'] = strtotime('now');
		}
	}

?>