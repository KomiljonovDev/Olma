<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- css file -->
    <link rel="stylesheet" href="../../assets/styles/main.css">
    <!-- Bootstarp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="  crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <header>
        <nav>
          <a href="../../">

          <div class="logo">
            
            <h3>
            O<span>l</span>m<span class="fs-1">a</span>
            </h3>
      
          </div>
      
          </a>
          <ul class="nav-links" id="nav-links">
            <i class="fa-solid fa-x toggle-x" id="x-bar"></i>
      
            <li>
              <a href="../../login/login.php?do=chat">
                <i class="fa-regular fa-comment"></i> 
                Chat
              </a>
            </li>
      
            <li>
              <a href="../../aloqa/index.html">
                <i class="fa-regular fa-id-badge mx-1"></i>
                Aloqa
              </a>
            </li>
      
            <li>
              <a href="../../login/login.php?do=signup">
                <i class="fa-regular fa-user"></i>
                Mening profilim
              </a>
            </li>
      
            <li>
              <a href="../../login/index.html" class="add__btn">
                E'lon Berish
              </a>
            </li>
      
          </ul>
      
          <div class="toggles" id="bar">		
            <i class="fa-solid fa-bars toggle"></i>
          </div>
        </nav>
      </header>

<div class="container">
    <form action="../index.php?do=announce" method="POST" enctype="multipart/form-data">
    <div class="row">
        <h2 class="mt-5 mb-5">E’lon joylashtirish</h2>
        <div class="col-md-12 bg-white p-3">
            <h5 class="text mt-2 mb-2"><b>Bizga e’loningiz haqida gapirib bering</b></h5>
                <label for="" class="mt-3 text-secondary">Sarlavhani kiriting*</label>
                <input class="form-control mb-2 mt-1" type="text" placeholder="Masalan iPhone 11 kafolati bilan" required name="name">
                <label for="" class="mt-3 text-secondary">Maxsulot narxini (Faqat so`mda va raqamlarda) kiriting*</label>
                <input class="form-control mb-2 mt-1" type="number" placeholder="" required name="cost">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bg-white mt-2 p-3">
            <h5 class="text mt-2"><b>Rasm biriktirish</b></h5>
                <label for="" class="text-secondary">Birinchi surat e’loningiz asosiy rasmi bo’ladi. Suratlar tartibini ularning ustiga bosib va olib o’tish bilan o’zgartirishingiz mumkin.</label>
                <input class="form-control mb-2 mt-1" type="file" required name="img">
                <input class="form-control mb-2 mt-1" type="file" required name="img1">
                <input class="form-control mb-2 mt-1" type="file" required name="img2">
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bg-white mt-2 p-3">
            <span class="mt-1 mb-2 text-dark fs-5"><b>Tavsif</b></span><br>
            <label for="" class="mt-1 mb-1 text-secondary">Tavsif*</label>
            <div class="form-floating">
                    <textarea style="height: 200px;" class="form-control mb-2 minTextArea" placeholder="Eloningiz haqida foydalanuvchilarga tavsif yozing" id="floatingTextarea2" style="height: 100px" required name="desc"></textarea>
            </div>
            <p class="text-secondary minText">Tavsif matini eng kamida 80ta belgidan iborat bo'lishi kerak!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bg-white p-3 mt-2">
            <h5 class="text mt-3 mb-2"><b>Aloqa uchun ma'lumotlar</b></h5>

            <label for="" class="mt-3 text-secondary">Yetkazib berish*</label>
            <input class="mb-2 mt-1" type="checkbox" name="delivery">
            <br>
            <label for="" class="mt-3 text-secondary">Joylashuv*</label>
            <input class="form-control mb-2 mt-1" type="text" placeholder="Shaxar yoki pochta indeksi" required name="location">

            <label for="" class="mt-3 text-secondary">Telefon raqami</label>
            <input class="form-control mb-2 mt-1" type="text" placeholder="" required name="phone">
        </div>
        <input type="submit" class="btn btn-dark mb-2" id="submitBtn" value="E'lonni joylashtirish">
    </div>
    </form>
</div>


<script>
    const minTextArea = document.querySelector(".minTextArea");
    const minText = document.querySelector(".minText");
    const submitBtn = document.querySelector("#submitBtn");

    minTextArea.addEventListener('keyup', function () {
        min = minTextArea.value;


        minLen = min.length;
        if (minLen < 80) {
            minText.style.setProperty('color', 'red', 'important');
            submitBtn.classList.remove('btn-dark');
            submitBtn.classList.add('btn-secondary');
        }else{
            minText.style.setProperty('color', 'green', 'important');
            submitBtn.classList.add('btn-dark');
            submitBtn.classList.remove('btn-secondary');
        }
        console.log(minLen);
    })
        
</script>
</body>
</html>