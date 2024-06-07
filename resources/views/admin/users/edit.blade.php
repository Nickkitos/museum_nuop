@extends('layouts.admin_layout')

@section('title', 'Редагувати користувача')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Редагувати користувача: {{ $user['name'] }}</h1>
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
        <form method="POST" action="{{ route('users.update', $user['id']) }}">
          @csrf
          @method('PUT')
          <div class="card-body">

            <div class="form-group">
              <label for="name">Ім'я</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user['name'] }}" id="name" name="name" placeholder="Введіть ім'я" required autocomplete="name" autofocus>
              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user['email'] }}" placeholder="Введіть email" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Введіть новий пароль" autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group">
              <label for="role">Роль</label>
              <select class="custom-select rounded-0" id="role" name="role">
                <option value="user" @if($user->hasRole('user')) selected @endif>User</option>
                <option value="manager" @if($user->hasRole('manager')) selected @endif>Manager</option>
                <option value="admin" @if($user->hasRole('admin')) selected @endif>Admin</option>
              </select>            
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Оновити</button>
          </div>
        </form>
      </div>
      
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




@endsection