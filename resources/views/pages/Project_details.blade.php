@extends('layouts.layout');
@section('content');
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects Detail</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated budget</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$project_budget['estimated_budget']}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total amount spent</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$project_budget['amount_spent']}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Estimated project duration</span>
                      <span class="info-box-number text-center text-muted mb-0">{{$project_budget['estimated_duration']}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-paint-brush"></i> {{$project['project_name']}} </h3>
              <p class="text-muted">{{$project['project_desc']}} </p>
              <br>
              <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block">{{$project['client_company']}}</b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">{{$project['project_leader']}}</b>
                </p>
              </div>
              @php
               $projectfile=explode(",",$project['project_file']);
              @endphp
              <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                @foreach($projectfile as $key)
               <li>   
                  <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> {{$key}}</a>
                
                </li>
                @endforeach
              </ul>
              <form action="{{ route('projects.update',$project['project_id']) }}" method="POST" enctype="multipart/form-data">
              @csrf  
              @method("PUT")
                <input type="file"  name="project_file[]" id="project_file" multiple><input type="submit" name="upload" >
              </form>
            </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
