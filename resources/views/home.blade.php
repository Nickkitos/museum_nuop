@include('/partials/header')

<div class="home_content">
    <div id="home_container" class="container">
        <h1>Політехнічний музей</h1>
        <p class="description">Національного університету "Одеська політехніка"</p>
        <div class="statistics">
            <div>
                <p class="numbers">{{ $collections_count }}</p>
                <p class="stat_description">колекцій</p>
            </div>
            <div>
                <p class="numbers">{{ $artifact_count }}</p>
                <p class="stat_description">експонатів</p>
            </div>
        </div>
        <div class="btn_to_vr">
            <p>Переглянути</p>
        </div>
    </div>
</div>
</section>

<section class="news">
    <div class="container">
        <div class="nav_menu">
            <a href="/home">новини</a>
            <a href="/about">про музей</a>
            <a href="/collections">колекції</a>
            <a href="#">екскурсії</a>
            <div class="faculty_dropdown">
                <span>факультети</span>
                <div id="faculty_list">
                    <ul>
                        @foreach ($faculty as $faculty)
                            <li><a href="#">{{ $faculty->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @foreach ($news as $item)
    <div class="article">
        <h1 class="article_name">{{ $item->title }}</h1>
        <hr class="article_start">

         @php
            $images = $item->images;
            $imageCount = $images->count();
        @endphp
        @if ($imageCount > 0)
            <div class="images_row_1">
                @foreach ($images->take(2) as $image)
                    <img src="{{ $image->url }}">
                @endforeach
            </div>
            @if ($imageCount > 2)
                <div class="images_row_2">
                    @foreach ($images->skip(2)->take(4) as $image)
                        <img src="{{ $image->url }}">
                    @endforeach
                </div>
            @endif
        @endif  


        <p class="article_description">{{ $item->description }}</p>
        <div class="btn_date">
            <div class="article_button">
                <a href="/news/{{ $item->id }}"><p>дізнатися більше</p></a>
            </div>
            <p class="article_date">{{ $item->created_at->format('d.m.Y') }}</p>
        </div>
        <hr class="article_end">
    </div>
    @endforeach 


</section>


@include('/partials/footer')

