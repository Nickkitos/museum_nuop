<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Museum NUOP</title>
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>
    <section class="home_view">
        <header>
            <div class="container">
                <div class="burger_menu">
                    <img class="burger_icon" src="/assets/img/header/burger.svg" onclick="toggleMenu()">
                    <ul class="menu_items">
                        <li><img src="/assets/img/header/close.svg" onclick="closeMenu()"></li>
                        <li><hr class="hr_menu"></li>
                        <li><a href="/home">Головна</a></li>
                        <li><a href="#">Історія музею</a></li>
                        <li><a href="/collections">Колекції</a></li>
                        <li><a href="#">Екскурсії</a></li>
                        <li><a href="#">Про проект</a></li>
                    </ul>
                </div>
                <div class="search">
                    <img src="/assets/img/header/magnifier.svg">
                    <input type="text" placeholder="Пошук...">
                </div>
                <img src="/assets/img/logo.png">
                <div class="links">
                    <div class="map">
                        <img src="/assets/img/header/map.png">
                        <a href="/map">карта</a>
                    </div>
                    <a href="#">контакти</a>
                    @if(Auth::check())
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">вихід</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        <!-- CSRF токен для захисту від атак CSRF -->
                    </form>
                    
                    @else
                        <a href="#">мова</a>
                    @endif

                     
                </div>
            </div> 
        </header>