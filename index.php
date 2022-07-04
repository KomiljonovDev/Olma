<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OlmaUz</title>
    <!-- css file -->
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/main.css">
    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"   integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="   crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!-- home page start -->

<header>
  <nav>
       <a href="./">

    <div class="logo">
      
      <h3>
      O<span>l</span>m<span class="fs-1">a</span>
      </h3>

    </div>
</a>
    <ul class="nav-links" id="nav-links">
      <i class="fa-solid fa-x toggle-x" id="x-bar"></i>

      <li>
        <a href="./login/login.php?do=chat">
          <i class="fa-regular fa-comment"></i> 
          Chat
        </a>
      </li>

      <li>
        <a href="./aloqa/">
          <i class="fa-regular fa-id-badge mx-1"></i> 
          Aloqa
        </a>
      </li>

      <li>
        <a href="./cabinet/">
          <i class="fa-regular fa-user"></i>
          Mening profilim
        </a>
      </li>

      <li>
        <a href="./login/login.php?do=announce" class="add__btn">
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
  <form action="#">
    <div class="search__bar__main">
      <div class="search__bar__input">
        <i class="fa-solid fa-magnifying-glass"></i>
        <?php
            require 'php/db.php';
            $product_count = (($product_count = mysqli_num_rows($query = mysqli_query($conn,"SELECT * FROM product WHERE sold!='1' ORDER BY view DESC")))>0) ? $product_count : "Bir necha";
        ?>
        <input type="text" placeholder="<?php echo $product_count; ?> e'lonlar yoningizda" id="searchProduct">
      </div>

  
      <a id="search-btn" class="search__bar__input"  data-bs-toggle="modal" data-bs-target="#exampleModal">
        Qidiruv
        <i class="fa-solid fa-magnifying-glass"></i>
      </a>
    </div>
  </form>
</div>


<!-- cards start -->

<div class="container mt-2 mb-5">
  <div class="row">
    <h1 class="text text-center mt-5 mb-5" style="font-weight: 600; position: relative; top: 20px;">TOP E'LONLAR</h1>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4 mt-3" id="products">
      
  </div>
</div>

<!-- cards end -->



<div class="business__banner">
  <div class="business__banner__main">
    <div class="business__banner__icon">
      <img src="https://static.olx.uz/static/olxuz/packed/font/2fbd23c39bff0aee6c0c84aaf60e66347d.svg" alt="">
    </div>

    <div class="business__banner__text">
      OLMA.uz bilan internetda biznesingizni boshlang!
    </div>

    <div class="business__banner__btn">
      <a href="https://t.me/OlmaOffical">
        Batafsil
      </a>
    </div>
  </div>
</div>


<div class="about__banner py-5">
  <div class="about__banner__main py-5 w-75 m-auto">
    <div class="about__banner__title w-100">
      <div class="w-100">
        <h1 class="fw-bold text-center" style="font-size: 45px;">
          O<span style="font-size: 60px; font-weight: normal;">l</span>m<span style="font-size: 55px;">a</span>
        </h1>
      </div>
    </div>

    <div class="about__banner__des text-center m-auto">
              Oʻzbekistonda 1-raqamli eʼlonlar servisi <br>
      Oʻzbekiston xususiy eʼlonlari OLMA.uz – bu yerda izlaganingizni topasiz. <br>
      "Eʼlon joylashtirish" tugmasiga bosib, siz istalgan mavzuga oid onlayn-eʼlonni joylashtira olasiz – ish qidirish, xizmat koʻrsatish, <br> avtomobillar, koʻchmas mulk, elektronika va boshqalar savdosi. <br>
      OLMA.uz Oʻzbekiston servisi yordamida siz deyarli barcha istagan narsangizni sotish yoki sotib olishingiz mumkin. Qidiruv funksiyasidan <br> foydalanib, oʻzingizni qiziqtirgan mavzuga oid sersisda mavjud eʼlonlarni hech bir qiyinchiliksiz topa olasiz.
      <br> OLMA.uz Oʻzbekiston – sizning ishonchli va tengi yoʻq yordamchingiz.
    </div>
  </div>
</div>


<div class="services__bar">
  <div class="services__bar__main">
    <div class="services__bar__icon">
      <img src="https://static.olx.uz/static/olxuz/packed/font/2fc1ef4e9c6a6dc640b6feb727836fabc7.svg" alt="SERVICES">
    </div>

    <div class="services__bar__text">
      OLMA.uz servisining boʻlimlari: Bolalar dunyosi, Ko'chmas mulk, Transport, Ish, Hayvonlar, Uy va bog', Elektr jihozlari, Xizmatlar, Moda va stil, Xobbi, dam olish sport, Tekinga beraman, Ayirboshlash
    </div>
  </div>
</div>


<footer>
  <div class="footer__bottom">
    <div class="footer__left">
      <ul>
        <li>
          <a href="./login">Ro`yhatdan o`tish</a>
        </li>

        <li>
          <a href="./aloqa">Yordam</a>
        </li>

        <li>
          <a href="#">OLMA.uz da biznes</a>
        </li>

        <li>
          <a href="https://t.me/GoldCoderUz">Saytda reklama</a>
        </li>
      </ul>
    </div>

    <div class="footer__right">
      <ul>
        <li>
          <a href="#">Sayt xaritasi</a>
        </li>

        <li>
          <a href="./cabinet">Qanday sotib olish va sotish?</a>
        </li>

        <li>
          <a href="./aloqa">Aloqa</a>
        </li>

        <li>
          <a href="https://t.me/VirGroup">Dasturchi</a>
        </li>

        
      </ul>
    </div>
  </div>
</footer>


<!-- home page end -->
    
<div class="modal" tabindex="-1" id="exampleModal">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" style="height: auto; !important;">
      <div class="modal-header px-5">
        <h5 class="modal-title" id="exampleModalToggleLabel">Natijalar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal__cards w-100 d-flex p-5 flex-wrap justify-content-center" id="search-content">
        <h2 class="text-danger" style="height: 90vh;">
        	E'lonlar mavjud emas!
        </h2>
      </div>
    </div>
  </div>
</div>


<!-- js file -->
<script src="./assets/js/app.js"></script>
<script type="text/javascript">
  const products = document.getElementById('products');
  xhr = new XMLHttpRequest();
  xhr.open('POST', './api/products.php?do=getProduct',true);
  xhr.onload = () =>{
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);
      if (data.ok === true) {
        data.result.forEach((value) => {
          products.innerHTML += `<a class="text-dark" style="text-decoration:none;" href="./product/?product_id=${value.id}"><div class="col">
            <div class="card h-100">
              <img src="./uploads/${value.img}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">${value.name}</h5>
                <p class="card-text main-cart-text">${value.description.slice(0, 120) + '...'}</p>
                <div class="d-flex justify-content-between">
                <p class="card-text"><b>${value.cost} So'm</b></p>
                <p class="d-flex">
                <span class="text-secondary">
                <svg style="position:relative; bottom:1px; right:3px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg> ${value.view}</span>
                </p>
                </div>
              </div>
            </div>
          </div></a>`;
        });
      }
    }
  }
  xhr.send();
</script>
<script>
  const  Desc1Item = document.querySelectorAll('.main-cart-text');
  Desc1Item.forEach(e => {
    let innText = e.innerText.slice(0,120)+'...'
    e.innerText = innText
  });
  function search1(val) {
  	let orders = {}

    const searchContent = document.getElementById('search-content')

	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
	      if (this.readyState == 4 && this.status == 200) {
	         orders =JSON.parse( xhttp.responseText )
	         console.log(orders)
	      }

	       if (!orders.result) {
	          searchContent.innerHTML = "<h2 class=\"text-center text-danger py-5 my-5\">E'lonlar topilmadi</h2>"
	        } else {
	          searchContent.innerHTML = '';
	          orders.result.forEach(i => {
	              searchContent.innerHTML += '<div class="card h-100 m-2" style="width: 30%;">   <img src="./uploads/' +i.img+ '" class="card-img-top" alt="...">              <div class="card-body">              <a class="text-dark link" href="./product/?product_id=' + i.product_id + '" style="text-decoration: none;">    <h5 class="card-title">' + i.name + '</h5>      </a>          <p class="card-text main-cart-text">' + i.description + '</p>                <div class="d-flex justify-content-between">  <p class="card-text"><b>' + i.cost + ' So`m</b></p> </div></div></div> '



	        // console.log(json)
	               });


	            const  DescItem = document.querySelectorAll('#search-content .main-cart-text');
	            DescItem.forEach(e => {
	              let innText = e.innerText.slice(0,120)+'...'
	              e.innerText = innText
	            });

	        }
	  };
	  xhttp.open("GET", './api/searchProduct.php?search='+val, true);
	  xhttp.send();
	 
  } 


    const search_Btn = document.getElementById("searchProduct");
  search_Btn.addEventListener('keyup',function() {
    let search = search_Btn.value;
    search1(search);

    })



	function getGet(name) {
	    var s = window.location.search;
	    s = s.match(new RegExp(name + '=([^&=]+)'));
	    return s ? s[1] : false;
	}


	if (getGet('search')) {
		search1(getGet('search'));
		document.querySelector('#search-btn').click();
	}
</script>
</body>
</html>
