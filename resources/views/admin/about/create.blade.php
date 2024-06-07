@extends('layouts.admin_layout')

@section('title', 'Про нас')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Про нас</h1>
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
          <form method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="card-body">

                <div class="block">
                    <div class="form-group">
                        <label for="description_1">Текст 1</label>
                        <textarea id="description_1" name="description_1" class="form-control @error('description_1') is-invalid @enderror" rows="4"></textarea>
                        @error('description_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                                
                    <div class="form-group">
                        <label for="img">Картинка 1</label>
                        <img src="" alt="" class="img-uploaded_1"><br>
                        <input type="text" class="form-control @error('img_1') is-invalid @enderror" id="img_1" name="img_1" value="" readonly>
                        @error('img_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="butons_img">
                            <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="img_1">Виберіть зображення</button>
                        </div>
                    </div>
                </div>

                <div class="block">
                    <div class="form-group">
                        <label for="description_2">Текст 2</label>
                        <textarea id="description_2" name="description_2" class="form-control @error('description_2') is-invalid @enderror" rows="4"></textarea>
                        @error('description_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="img">Картинка 2</label>
                        <img src="" alt="" class="img-uploaded_2"><br>
                        <input type="text" class="form-control @error('img_2') is-invalid @enderror" id="img_2" name="img_2" value="" readonly>
                        @error('img_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="butons_img">
                            <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="img_2">Виберіть зображення</button>
                        </div>
                    </div>
                </div>

                <div class="block">
                    <div class="form-group">
                        <label for="video">Відео</label><br>
                        <video controls class="video"></video><br>
                        <input type="text" class="form-control @error('video') is-invalid @enderror" id="video" name="video" value="" readonly>
                        @error('video')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="butons_img">
                            <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="video">Виберіть відео</button>
                        </div>
                    </div>
                    
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

