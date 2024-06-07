@extends('layouts.admin_layout')

@section('title', 'Додати користувача')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Додати користувача</h1>
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
        <form method="POST" action="{{ route('users.store') }}">
          @csrf
          <div class="card-body">

            <div class="form-group">
              <label for="name">Ім'я</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Введіть ім'я" required autocomplete="name" autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Введіть email" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="password">Пароль</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Введіть пароль" required autocomplete="new-password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="role">Роль</label>
              <select class="custom-select rounded-0" id="role" name="role">
                <option value="user">User</option>
                <option value="manager">Manager</option>
                <option value="admin">Admin</option>
              </select>
            </div>
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