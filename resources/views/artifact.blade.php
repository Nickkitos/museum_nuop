@extends('partials.layout')

@section('title', 'Експонат')

<script type="module" src="https://cdn.jsdelivr.net/npm/@google/model-viewer/dist/model-viewer.min.js"></script>

@section('main_content')
    <div class="article">


        <h1 class="article_name">Експонат: {{ $artifact['title'] }} </h1>
        <hr class="article_start">

        <div class="Dmodel">
            <model-viewer alt="" shadow-intensity="1" camera-controls touch-action="pan-y" poster="" class="model" src="/{{ $artifact['model'] }}"></model-viewer><br>
        </div>

        <div class="text_model">
            {!! $artifact->description !!}
        </div>

        <div class="this_collection">
            <h1>Моделі з цієї колекції<h1>

            <div class="content">
                @foreach ($related_artifacts as $related_artifact)
                <a href="/artifact/{{ $related_artifact->id }}">
                    <div class="cards">
                        <img src="/{{ $related_artifact->img }}">
                        <p>{{ $related_artifact->title }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>  
    </div>
    





@endsection
