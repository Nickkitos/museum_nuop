@extends('layouts.admin_layout')

@section('title', 'Створити Інвентарну картку')

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Інвентарна картка</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        
            </div><!-- /.container-fluid -->
        </div>

        <div class="card card-primary">
          <form method="POST" action="{{ route('artifact.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="card-body">

                <div class="block">
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
                        <label for="inv_number">Інвентарний №</label>
                        <input type="number" id="inv_number" name="inv_number" class="form-control @error('inv_number') is-invalid @enderror">
                        @error('inv_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_arrival">Дата надходження</label>
                        <input type="date" id="date_arrival" name="date_arrival" class="form-control @error('date_arrival') is-invalid @enderror">
                        @error('date_arrival')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="number_arrival">№ за книгою надходжень</label>
                        <input type="text" id="number_arrival" name="number_arrival" class="form-control @error('number_arrival') is-invalid @enderror">
                        @error('date_arrival')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="group_id">Група</label>
                        <select id="group_id" name="group_id" class="form-control @error('group_id') is-invalid @enderror">
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <label for="department_id">Відділ</label>
                        <select id="department_id" name="department_id" class="form-control @error('department_id') is-invalid @enderror">
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="collections_id">Колекція</label>
                        <select id="collections_id" name="collections_id" class="form-control @error('collections_id') is-invalid @enderror">
                            @foreach($collections as $collection)
                                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="block">
                    <div class="form-group">
                        <label for="description">Опис експонату</label>
                        <textarea id="description" name="description" class="form-control text @error('description') is-invalid @enderror" rows="4"></textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="history">Історія експонату</label>
                        <textarea id="history" name="history" class="form-control text @error('history') is-invalid @enderror" rows="4"></textarea>
                        @error('history')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                    <div class="image-container">
                        <div class="form-group">
                            <label for="img">Зображення</label>
                            <img src="" alt="" class="img-uploaded_1"><br>
                            <input type="text" class="form-control @error('img') is-invalid @enderror" id="img_1" name="img" value="" readonly>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="butons_img">
                                <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="img_1">Виберіть зображення</button>
                            </div>
                        </div>
                    </div>

                    <div class="image-container">
                        <div class="form-group">
                            <label for="model">3D модель</label>
                            <model-viewer alt="" shadow-intensity="1" camera-controls touch-action="pan-y" poster="" class="model"></model-viewer><br>
                            <input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="" readonly>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="butons_img">
                                <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="model">Виберіть модель</button>
                            </div>
                        </div>
                    </div>

                    <div class="image-container">
                        <div class="form-group">
                            <label for="document">Документ</label><br> 
                            <embed src="" type="application/pdf" width="300px" class="document"></embed>                       
                            <input type="text" class="form-control @error('document') is-invalid @enderror" id="document" name="document" value="" readonly>
                            @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="butons_img">
                                <button type="button" class="btn btn-sm btn-outline-success btn-lg popup_selector" data-inputid="document">Виберіть документ</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block">
                    <div class="form-group">
                        <label for="place_found">Де знайдено (адреса)</label>
                        <input type="text" id="place_found" name="place_found" class="form-control @error('place_found') is-invalid @enderror">
                        @error('place_found')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="who_found">Від кого надійшов предмет</label>
                        <input type="text" id="who_found" name="who_found" class="form-control @error('who_found') is-invalid @enderror">
                        @error('who_found')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="receipt_document">Документ надходження</label>
                        <input type="text" id="receipt_document" name="receipt_document" class="form-control @error('receipt_document') is-invalid @enderror">
                        @error('receipt_document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="material">Матеріал</label>
                        <input type="text" id="material" name="material" class="form-control @error('material') is-invalid @enderror">
                        @error('material')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="technology">Техніка виготовлення</label>
                        <input type="text" id="technology" name="technology" class="form-control @error('technology') is-invalid @enderror">
                        @error('technology')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="dimension">Розмір (см)</label>
                        <div class="input-group">
                            <input type="text" id="height" name="height" placeholder="Висота" class="form-control @error('height') is-invalid @enderror">
                            <div class="input-group-prepend">
                                <span class="input-group-text">x</span>
                            </div>
                            <input type="text" id="width" name="width" placeholder="Ширина" class="form-control @error('width') is-invalid @enderror">
                            <div class="input-group-prepend">
                                <span class="input-group-text">x</span>
                            </div>
                            <input type="text" id="length" name="length" placeholder="Довжина" class="form-control @error('length') is-invalid @enderror">
                        </div>
                        @error('height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('width')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('length')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="weight">Вага (кг)</label>
                        <input type="text" id="weight" name="weight" class="form-control @error('weight') is-invalid @enderror">
                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="state">Стан експонату</label>
                        <textarea id="state" name="state" class="form-control text @error('state') is-invalid @enderror" rows="4"></textarea>
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="storage_loc">Місце зберігання</label>
                        <textarea id="storage_loc" name="storage_loc" class="form-control text @error('storage_loc') is-invalid @enderror" rows="4"></textarea>
                        @error('storage_loc')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div><br>
                </div>


                    <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" name="publish" id="publish">
                          <label class="custom-control-label" for="publish">Опублікувати на сайті</label>
                        </div>
                    </div>
                
            
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Створити</button>
            </div>
          </form>
        </div>
    </div>
</section>

<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>

@endsection 

