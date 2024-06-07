@extends('layouts.admin_layout')

@section('title', 'Головна')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Головна</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3> {{ $news_count }} </h3>

              <p>Новини</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
            <a href="{{ route('news.index') }}" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{ $colections_count }}</h3>

              <p>Колекції</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <a href="{{ route('collections.index') }}" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $artifact_count }}</h3>

              <p>Експонати</p>
            </div>
            <div class="icon">
              <i class="ion ion-wineglass"></i>
            </div>
            <a href="{{ route('artifact.index') }}" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $users_count }}</h3>

              <p>Працівники</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('users.index') }}" class="small-box-footer">Перейти <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <div class="col-12">
        <!-- interactive chart -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="far fa-chart-bar"></i>
              Interactive Area Chart
            </h3>

            <div class="card-tools">
              Real time
              <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div id="interactive" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="959" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 767.8px; height: 300px;"></canvas><canvas class="flot-overlay" width="959" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 767.8px; height: 300px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;"><text x="28" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">0</text><text x="97.53897954478407" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">10</text><text x="171.05413105993557" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">20</text><text x="244.5692825750871" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">30</text><text x="318.0844340902386" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">40</text><text x="391.5995856053901" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">50</text><text x="465.11473712054163" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">60</text><text x="538.6298886356931" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">70</text><text x="612.1450401508446" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">80</text><text x="685.6601916659961" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">90</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;"><text x="8.952343940734863" y="269" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text><text x="1" y="15" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">70</text><text x="1" y="232.71428571428572" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text><text x="1" y="196.42857142857142" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text><text x="1" y="160.14285714285714" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">30</text><text x="1" y="123.85714285714286" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">40</text><text x="1" y="87.57142857142857" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">50</text><text x="1" y="51.285714285714285" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">60</text></g></svg></div></div>
          </div>
          <!-- /.card-body-->
        </div>
        <!-- /.card -->

      </div>
     
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

  @endsection