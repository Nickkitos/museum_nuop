@extends('layouts.admin_layout')

@section('title', 'Відділи')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Відділи</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->

    @if (session('success'))
      <div class="alert alert-success" role="alert">
          {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

  </div><!-- /.container-fluid -->
</div>

<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Назва</th>
                            <th>Дата створення</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->created_at }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('departments.edit', ['department' => $department->id]) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Змінити
                                </a>
                                <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display: inline-block">
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
        </div>

        <div class="card-footer clearfix">
            <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('departments.create') }}"><button type="button" class="btn btn-block btn-primary">Додати відділ</button></a>
                </div>
                <div class="col-md-10">
                    <ul class="pagination pagination-sm m-0 float-right">
                        @if ($departments->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">«</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $departments->previousPageUrl() }}">«</a></li>
                        @endif
    
                        @foreach ($departments->getUrlRange(1, $departments->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $departments->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
    
                        @if ($departments->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $departments->nextPageUrl() }}">»</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">»</span></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
