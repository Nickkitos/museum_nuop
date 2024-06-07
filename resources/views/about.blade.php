@extends('partials.layout')

@section('title', 'Деталі новини')

@section('main_content')
    <div class="article">
        <h1 class="article_name">Про нас</h1>
        <hr class="article_start">
    

    @foreach($about as $about)

        <div class="article_description">
            <div class="part">
                <p id="left_p">{{ $about->description_1 }}</p>
                <img src="/{{ $about->img_1 }}">
            </div>
            <div class="part">
                <img src="/{{ $about->img_2 }}">
                <p id="right_p">{{ $about->description_2 }}</p>
            </div>
        </div>

    </div>
    

    <section class="dark_slider">
        <div class="video_wrapper">
            <video controls>
                <source src="{{ $about->video }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </section>
    

    <div class="article">
        <div class="article_description">
            {!! $about->text !!}
        </div>
    </div>

    @endforeach

@endsection
