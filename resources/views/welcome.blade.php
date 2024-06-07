<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Virtual Museum NUOP</title>

    <link href="/assets/css/style_indx.css" rel="stylesheet">
    <link href="/assets/css/responsive_indx.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
</head>

<body>
    <div class="preloader">
    <div class="preloader__row">
        <div class="preloader__item"></div>
        <div class="preloader__item"></div>
    </div>
    </div>

    <style>
        .preloader {
    /*фиксированное позиционирование*/
    position: fixed;
    /* координаты положения */
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    /* фоновый цвет элемента */
    background: #e0e0e0;
    /* размещаем блок над всеми элементами на странице (это значение должно быть больше, чем у любого другого позиционированного элемента на странице) */
    z-index: 1001;
  }
  
  .preloader__row {
    position: relative;
    top: 50%;
    left: 50%;
    width: 70px;
    height: 70px;
    margin-top: -35px;
    margin-left: -35px;
    text-align: center;
    animation: preloader-rotate 2s infinite linear;
  }
  
  .preloader__item {
    position: absolute;
    display: inline-block;
    top: 0;
    background-color: #337ab7;
    border-radius: 100%;
    width: 35px;
    height: 35px;
    animation: preloader-bounce 2s infinite ease-in-out;
  }
  
  .preloader__item:last-child {
    top: auto;
    bottom: 0;
    animation-delay: -1s;
  }
  
  @keyframes preloader-rotate {
    100% {
      transform: rotate(360deg);
    }
  }
  
  @keyframes preloader-bounce {
  
    0%,
    100% {
      transform: scale(0);
    }
  
    50% {
      transform: scale(1);
    }
  }
  
  .loaded_hiding .preloader {
    transition: 0.3s opacity;
    opacity: 0;
  }
  
  .loaded .preloader {
    display: none;
  }
    </style>


    <header>
        <div class="container">
            <img src="/assets/img/welcome/sound.svg">
            <h1>Проєкт</h1>
        </div> 
    </header>

    <div class="content">
        <h1>Virtual Museums</h1>
        <p>Ваш ключ до культурного світу, всього за кілька миттєвостей</p>
        <div class="btn_to_home">
            <a href="/home"><div class="circle">
                <img class="arrow" src="/assets/img/welcome/arrow.svg">
            </div></a>
            <p>До головної</p>
        </div>
    </div>

    <footer>
        <div id="footer_container" class="container">
            <div class="left_block">
                <p>Made with<br> some friends from</p>
                <h1>Google</h1>
            </div>
            <h1>Конфіденційність & Умови</h1>
        </div> 
    </footer>
</body>
</html>

<script>
window.onload = function () {
document.body.classList.add('loaded_hiding');
window.setTimeout(function () {
    document.body.classList.add('loaded');
    document.body.classList.remove('loaded_hiding');
}, 500);
}
</script>