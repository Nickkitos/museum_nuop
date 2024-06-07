@extends('layouts.admin_layout')

@section('title', 'Про нас')

@section('content')

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
                        <th>Дата публікації</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($about as $about)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Номер сторінки * кількість записів на сторінці + порядковий номер на сторінці -->
                            <td>{{ $about->created_at }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href='{{ route('about.edit', ['about' => $about->id]) }}'>
                                    <i class="fas fa-pencil-alt"></i>
                                    Змінити
                                </a>
                                <form action="{{ route('about.destroy', $about['id']) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="fas fa-trash"></i>
                                        Видалити
                                    </button> --}}
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
      {{-- <div class="row">
        <div class="col-md-2">
            <a href="{{ route('about.create') }}"><button type="button" class="btn btn-block btn-primary">Додати новину</button></a>
        </div><br><br><br>
    </div> --}}
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->




@endsection