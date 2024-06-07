@include('/partials/header')

    <section class="collect">
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
                                <li><a href="/faculty/{{ $faculty->id }}">{{ $faculty->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>                                 
        </div>
        
         <h1><strong>Колекції:</strong> Політехнічний університет</h1>
         <div class="container">
            <div class="exposure">
                <div class="name">
                    <p>Колекції:</p>
                </div>
                <div class="menu_exp">
                    @foreach ($collections as $collection)
                    <div>
                        <p>{{ $collection->name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
 
         <div class="container">
            <div class="block_content">
                <div class="content">
                        @foreach ($artifacts as $artifact)
                        <a href="/artifact/{{ $artifact->id }}">
                            <div class="cards">
                                <img src="{{ $artifact->img }}">
                                <p>{{ $artifact->title }}</p>
                            </div>
                        </a>
                        @endforeach
                </div>
            </div>
         </div> 
          
    </section>

    
@include('/partials/footer')