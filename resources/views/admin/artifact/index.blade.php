@extends('layouts.admin_layout')

@section('title', 'Експонати')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Каталог</h1>
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
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table id="materials-table" class="table table-hover text-nowrap">
                    <thead>
                      <form action="{{route('artifact.index')}}" method="GET">
                      <tr>
                        <th><a href="#" data-sort="id">ID</a></th>
                        <th><a href="#" data-sort="title">Експонат</a></th>
                        <th><a class="desc" href="#" data-sort="created_at">Дата надходження</a></th>
                        <th><a href="#" data-sort="group_id">Група</a></th>
                        <th><a href="#" data-sort="department_id">Відділ</a></th>
                        <th><a href="#" data-sort="collections_id">Колекція</a></th>
                        <th><a href="#" data-sort="publish">Публікація</a></th>
                        <th width="60">Дії</th>
                      </tr>
                      <tr id="w0-filters" class="filters">
                        <td style="width: 10%"><input type="text" class="form-control" name="id" @if (@isset($_GET['id'])) value="{{$_GET['id']}}" @endif></td>
                        <td><input type="text" id="serchmaterials-title" class="form-control" name="title" placeholder="Введіть назву" @if (@isset($_GET['title'])) value="{{$_GET['title']}}" @endif></td>
                        <td><input type="date" id="serchmaterials-created_at" class="form-control" name="date" @if (@isset($_GET['date'])) value="{{$_GET['date']}}" @endif></td>
                        <td>
                          <select id="serchmaterials-group_id" class="form-control" name="group_id">
                            <option></option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}" @if (@isset($_GET['group_id'])) @if ($_GET['group_id'] == $group->id) selected @endif @endif>{{ $group->name }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td><select id="serchmaterials-department_id" class="form-control" name="department_id">
                          <option></option>
                           @foreach($departments as $department)
                                <option value="{{ $department->id }}" @if (@isset($_GET['department_id'])) @if ($_GET['department_id'] == $department->id) selected @endif @endif>{{ $department->name }}</option>
                            @endforeach
                          </select>
                        </td>
                        <td><select id="serchmaterials-collections_id" class="form-control" name="collections_id">
                          <option></option>
                          @foreach($collections as $collection)
                               <option value="{{ $collection->id }}" @if (@isset($_GET['collections_id'])) @if ($_GET['collections_id'] == $collection->id) selected @endif @endif>{{ $collection->name }}</option>
                           @endforeach
                         </select>
                        </td>
                        <td><select id="serchmaterials-publish" class="form-control" name="publish">
                         <option value="3"></option>
                          @foreach([1 => 'Опублікований', 0 => 'Не опублікований'] as $value => $label)
                            <option value="{{ $value }}" @if(isset($_GET['publish']) && $_GET['publish'] == $value) selected @endif>{{ $label }}</option>
                          @endforeach
                         </select>
                        </td>
                       <td><button type="submit" class="btn btn-primary">Фільтрувати</button></td>
                      </tr>
                      </form>
                    </thead>
                    <tbody>
                      @foreach ($artifact as $item)
                      <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->title }}</td>
                          <td>{{ $item->date_arrival }}</td>
                          <td>{{ $item->group->name }}</td>
                          <td>{{ $item->department->name }}</td>
                          <td>{{ $item->collection->name }}</td>
                          <td>
                              @if($item->publish == 1)
                                  Опублікований
                              @else
                                  Не опублікований
                              @endif
                          </td>
                          <td class="project-actions text-right">
                              <a class="btn btn-info btn-sm" href='{{ route('artifact.edit', ['artifact' => $item->id]) }}'>
                                  <i class="fas fa-pencil-alt"></i>
                              </a>
                              <form action="{{ route('artifact.destroy', $item['id']) }}" method="POST" style="display: inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                      <i class="fas fa-trash"></i>
                                  </button>
                              </form>
                              <a class="btn btn-warning btn-sm" href='{{ route('artifact.pdf', ['id' => $item->id]) }}
                                '>
                                <i class="fas fa-file-pdf"></i>
                             </a>                            
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
                <a href="{{ route('artifact.create') }}"><button type="button" class="btn btn-block btn-primary">Додати експонат</button></a>
            </div>
            <div class="col-md-10">
                <ul class="pagination pagination-sm m-0 float-right">
                    <!-- Переключення на попередню сторінку -->
                    @if ($artifact->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">«</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $artifact->previousPageUrl() }}">«</a></li>
                @endif
                
                <!-- Виведення посилань на сторінки -->
                @foreach ($artifact->getUrlRange(1, $artifact->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $artifact->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
                
                <!-- Переключення на наступну сторінку -->
                @if ($artifact->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $artifact->nextPageUrl() }}">»</a></li>
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
