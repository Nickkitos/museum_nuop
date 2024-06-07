@extends('partials.layout')

@section('title', 'Деталі новини')

@section('main_content')


    <div class="article">
        <h1 class="article_name">Факультет: {{ $faculty['name'] }}</h1>
        <hr class="article_start">
    
        <div class="article">
            <div class="article_description">
                {!! $faculty->description !!}
            </div>
        </div>
    </div>



@endsection
