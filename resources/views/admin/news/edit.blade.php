@extends('layouts.admin_layout')

@section('title', 'Редагувати новину')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редагувати новину: {{ $news['title'] }}</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
        
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
        
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
            <form data-news-page="edit" method="POST" action="{{ route('news.update', $news['id']) }}">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Назва</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $news['title'] }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Опис</label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ $news['description'] }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea id="text" name="text" class="form-control text @error('text') is-invalid @enderror" rows="4">{{ $news['text'] }}</textarea>
                        @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            
                    <div class="image-container">
                        @foreach ($newsImages as $image)
                        <div class="form-group">
                            <label for="img">Картинка {{ $loop->index + 1 }}</label>
                            <img src="/{{ $image->url }}" alt="" class="img-uploaded_{{ $loop->index + 1 }} "><br>
                            <input type="text" class="form-control @error('img.*') is-invalid @enderror" id="img_{{ $loop->index + 1 }}" name="img[]" value="{{ $image->url }}" readonly required>
                            @error('img.*')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="butons_img">
                                <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="img_{{ $loop->index + 1 }}">Виберіть зображення</button>
                                <button type="button" class="btn btn-sm btn-outline-danger delete-image-btn" data-index="{{ $loop->index + 1 }}">Видалити</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
            
                    <button type="button" class="add-more btn btn-block btn-outline-warning">Додати ЗОБРАЖЕННЯ</button>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Оновити</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection 
