@extends('layouts.admin_layout')

@section('title', 'Файли')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Файли</h1>
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
        <iframe src="/elfinder" style="width: 100%; height: 500px; border: none;"></iframe>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




@endsection