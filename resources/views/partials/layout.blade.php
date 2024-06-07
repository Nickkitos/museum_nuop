@include('/partials/header')
    <section class="main">

        <section class="news">
            <div class="container">
                <div class="nav_menu">
                    <a href="/home">новини</a>
                    <a href="/about">про музей</a>
                    <a href="/collections">колекції</a>
                    <a href="#">екскурсії</a>
                </div>
            </div>
        </section>

        @yield('main_content')

    </section>
    
@include('/partials/footer')