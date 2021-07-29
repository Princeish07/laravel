@extends('layouts.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->

 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Project Add</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/home">Home</a></li>
             <li class="breadcrumb-item active">Project Add</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="row">
       <div class="col-md-6">
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title">General</h3>
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
             </div>
           </div>
           <form action="{{route('projects.store')}}" method='POST' enctype="multipart/form-data">
             @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Project Name</label>
                <input type="text" id="project_name" name="project_name" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="inputDescription">Project Description</label>
                <textarea id="project_desc" name="project_desc"class="form-control" rows="4"></textarea>
              </div>
            <div class="form-group">
              <label>Project Team</label>
              <select multiple class="custom-select" name="project_team[]" id="project_team">
                @foreach($data as $project)
                 <option value="{{$project['id']}}">{{$project['name']}}</option>
                @endforeach
              </select>
            </div>           
             <div class="form-group">
               <label for="inputStatus">Client Status</label>
               <select id="client_status" name="client_status" class="form-control custom-select">
                 <option selected disabled>Select one</option>
                 <option>On Hold</option>
                 <option>Canceled</option>
                 <option>Success</option>
               </select>
             </div>
             <div class="form-group">
               <label for="inputClientCompany">Client Company</label>
               <input type="text" id="client_company" name="client_company" class="form-control">
             </div>
             <div class="form-group">
               <label for="inputProjectLeader">Project Leader</label>
               <input type="text" id="project_leader" name="project_leader" class="form-control">
             </div>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div>
       <div class="col-md-6">
         <div class="card card-secondary">
           <div class="card-header">
             <h3 class="card-title">Budget</h3>
             <div class="card-tools">
               <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
             </div>
           </div>
           <div class="card-body">
             <div class="form-group">
               <label for="inputEstimatedBudget">Estimated budget</label>
               <input type="number" id="estimated_budget" name="estimated_budget" class="form-control" required>
             </div>
             <div class="form-group">
               <label for="inputSpentBudget">Total amount spent</label>
               <input type="number" id="amount_spent" name="amount_spent" class="form-control" required>
             </div>
             <div class="form-group">
               <label for="inputEstimatedDuration">Estimated project duration</label>
               <input type="number" id="estimated_duration" name="estimated_duration" class="form-control" required>
             </div>
           </div>
           <!-- /.card-body -->
         </div>
         <!-- /.card -->
       </div> 
     </div>
     <div class="row">
       <div class="col-12">
         <a href="#" class="btn btn-secondary">Cancel</a>
         <input type="submit" name="submit" value="Create new Porject" class="btn btn-success float-right">
       </div>
     </div>
     </form>
  </section>
 <!-- /.content-wrapper -->
@endsection