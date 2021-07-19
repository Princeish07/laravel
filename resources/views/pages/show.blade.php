@extends('layouts.layout')
@section('content')
 <!--alert message of add,delete and edit -->
    @if ($message = Session::get('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; font-size:20px">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center; font-size:20px">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
    @endif
    @if ($message = Session::get('edit'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="text-align:center; font-size:20px">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
    @endif
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Projects</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">show</li>
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
         <h3 class="card-title">Projects</h3>
         <div class="card-tools">
           <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
             <i class="fas fa-minus"></i>
           </button>
           <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
             <i class="fas fa-times"></i>
           </button>
         </div>
       </div>
       <div class="card-body p-0">
         <table class="table table-striped projects">
            <thead>
              <tr>
                <th style="width: 1%">
                  Sno
                </th>
                <th style="width: 20%">
                  Project
                </th>
                <th style="width: 30%">
                  Team Members
                </th>
                <th style="width: 4%" class="text-center">
                  Status
                </th>
                <th style="width: 4%" class="text-center">
                  Estimated Budget
                </th>
                <th style="width: 20%">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>             
              @foreach($data as $project)
                @php
                  $i=0;
                  $array=explode(",",$project['project_team']);
                  $count=sizeof($array);
                @endphp
                <tr>
                  <td>
                   {{ $project['id']}}
                  </td>
                   <td>
                      <a>
                        {{ $project['project_name']}}
                      </a>
                      <br/>
                      <small>
                         {{ $project['created_at']}}
                      </small>
                   </td>
                   <td>                  
                      <ul class='list-inline'><li class='list-inline-item'>
                        @for($i=0;$i<$count;$i++)
                          <img alt='Avatar' class='table-avatar' src='dist/img/avatar3.png'>
                        @endfor
                        </li></td>
                     <td class="project-state">
                        <span class="badge badge-success">{{$project['client_status']}}</span>
                     </td>
                     <td class="project-state">
                        <span class="badge badge-success">{{$project->project_budgets->estimated_budget}}</span>
                     </td>
                     <form action="{{ route('projects.destroy', $project['id']) }}" method="POST">
                       <td class="project-actions text-right">
                         <a class="btn btn-primary btn-sm" href="{{ route('projects.show',$project['id']) }}">
                            <i class="fas fa-folder">
                            </i>
                            View
                         </a>
                         <a class="btn btn-info btn-sm" href="{{ route('projects.edit',$project['id']) }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                            @csrf
                            @method('DELETE')
                         </a>
                         <button class="btn btn-danger btn-sm" type="submit">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                         </button>                       
                       </td>
                     </form>
                   </td>
                  </td>
                </tr>
              @endforeach
            </tbody>
         </table>
       </div>
       <!-- /.card-body -->
     </div>
     <!-- /.card -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
@endsection