@extends('partials.layout')

@section('title', 'Деталі новини')

@section('main_content')
    <div class="article">
        <h1 class="article_name">{{ $new_id->title }}</h1>
        <hr class="article_start">
        <div class="article_description">{!! $new_id->text !!}</div>

        <!-- Додайте інші поля новини, які вам потрібні -->
    </div>

    <section class="dark_slider">

        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                @foreach ($images as $index => $image)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif aria-label="Slide {{ $loop->index + 1 }}"></button>
                @endforeach

            </div>
            <div class="carousel-inner">
                @foreach ($images as $index => $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                       
                            <img src="/{{ $image->url }}" class="d-block w-100" alt="...">
   
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $new_id->title }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        
    </section>

    <section class="blog">
            <div class="article">
                <h1 class="article_name">Блог за темою</h1>
                <hr class="article_start">
                <div class="blog_item">
                    <div class="blog_img">
                        <img src="/files/news/1.png">
                    </div>
                    <div class="blog_textbox">
                        <p class="blog_date">05.11.2023</p>
                        <h1 class="blog_title">Політехнічний музей у твоїй кишені</h1>
                        <p class="blog_description">Тематична експозиція присвячено 100-річчю першого випуску Одеського політехнічного інституту. Музей презентував архівні матеріали про студентів вишу першого набору (1918) і, відповідно, перших випускників інституту... </p>
                    </div>
                </div>
            </div>

            <div class="article">
                <div class="blog_item">
                    <div class="blog_img">
                        <img src="/files/news/1.png">
                    </div>
                    <div class="blog_textbox">
                        <p class="blog_date">05.11.2023</p>
                        <h1 class="blog_title">Політехнічний музей у твоїй кишені</h1>
                        <p class="blog_description">Тематична експозиція присвячено 100-річчю першого випуску Одеського політехнічного інституту. Музей презентував архівні матеріали про студентів вишу першого набору (1918) і, відповідно, перших випускників інституту... </p>
                    </div>
                </div>
            </div>
    </section>
    

@endsection
