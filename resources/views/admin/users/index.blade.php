@extends('layouts.admin_layout')

@section('title', 'Користувачі')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Користувачі</h1>
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

        <div class="row">
            <div class="col-12">
              <div class="card">
               {{--  <div class="card-header">
                  <h3 class="card-title">Responsive Hover Table</h3>
  
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
  
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>№</th>
                        <th>Ім'я</th>
                        <th>Email</th>
                        <th>Роль</th>
                        <th>Дата реєстрації</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Номер сторінки * кількість записів на сторінці + порядковий номер на сторінці -->
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role){{ $role->name }}@endforeach
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('users.edit', ['user' => $user->id]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Змінити
                                </a>
                                <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash"></i>
                                        Видалити
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                                           
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>          
          </div>
      </div> 
      <div class="card-footer clearfix">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('users.create') }}"><button type="button" class="btn btn-block btn-primary">Додати користувача</button></a>
            </div>
            <div class="col-md-10">
                <ul class="pagination pagination-sm m-0 float-right">
                    <!-- Переключення на попередню сторінку -->
                    @if ($users->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">«</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}">«</a></li>
                    @endif
    
                    <!-- Виведення посилань на сторінки -->
                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
    
                    <!-- Переключення на наступну сторінку -->
                    @if ($users->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}">»</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">»</span></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    
    
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




@endsection