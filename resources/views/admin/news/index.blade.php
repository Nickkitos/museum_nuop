@extends('layouts.admin_layout')

@section('title', 'Новини')

@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Новини</h1>
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
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>№</th>
                            <th>Назва</th>
                            <th>Дата публікації</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href='{{ route('news.edit', ['news' => $item->id]) }}'>
                                    <i class="fas fa-pencil-alt"></i>
                                    Змінити
                                </a>
                                <form action="{{ route('news.destroy', $item->id) }}" method="POST" style="display: inline-block">
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
                    <a href="{{ route('news.create') }}"><button type="button" class="btn btn-block btn-primary">Додати новину</button></a>
                </div>
                <div class="col-md-10">
                    <ul class="pagination pagination-sm m-0 float-right">
                        @if ($news->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">«</span></li>
                        @else
                        <li class="page-item"><a class="page-link" href="{{ $news->previousPageUrl() }}">«</a></li>
                        @endif

                        @for ($i = 1; $i <= $news->lastPage(); $i++)
                        <li class="page-item {{ $i == $news->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $news->url($i) }}">{{ $i }}</a>
                        </li>
                        @endfor

                        @if ($news->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $news->nextPageUrl() }}">»</a></li>
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
