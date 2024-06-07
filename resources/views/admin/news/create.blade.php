@extends('layouts.admin_layout')

@section('title', 'Додати новину')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Додати новину</h1>
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
          <form data-news-page="create" method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Назва</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="description">Опис</label>
                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="text">Текст</label>
                    <textarea id="text" name="text" class="form-control text @error('text') is-invalid @enderror" rows="4"></textarea>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="image-container">
                    <div class="form-group">
                        <label for="img">Картинка 1</label>
                        <img src="" alt="" class="img-uploaded_1"><br>
                        <input type="text" class="form-control @error('img.*') is-invalid @enderror" id="img_1" name="img[]" value="" readonly>
                        @error('img.*')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="butons_img">
                            <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="img_1">Виберіть зображення</button>
                            {{-- <button type="button" class="btn btn-sm btn-outline-danger delete-image-btn">Видалити</button> --}}
                        </div>
                    </div>
                </div>
                
                <button type="button" class="add-more btn btn-block btn-outline-warning">Додати ЗОБРАЖЕННЯ</button>
            
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Опублікувати</button>
            </div>
          </form>
        </div>
    </div>
</section>


@endsection 

