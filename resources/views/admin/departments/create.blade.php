@extends('layouts.admin_layout')

@section('title', 'Додати відділ')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Додати відділ</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->

    @if (session('success'))
      <div class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
    @endif

  </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      
      <div class="card card-primary">

        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('departments.store') }}">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label for="name">Назва</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введіть назву" required autocomplete="name" autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

    
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Створити</button>
          </div>
        </form>
      </div>
      
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




@endsection