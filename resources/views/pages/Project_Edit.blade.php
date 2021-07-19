@extends('layouts.layout')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Project Edit</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Project Edit</li>
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
           <form action="{{ route('projects.update',$project['id']) }}" method='POST' enctype="multipart/form-data">
              @csrf
              @method("PUT")
              @php
               $team= explode(",",$project['project_team']);
              @endphp
              <div class="card-body">
              <input type="hidden" id="id" name="id"  class="form-control">
               <div class="form-group">
                 <label for="inputName">Project Name</label>
                 <input type="text" id="project_name" name="project_name" value="{{$project['project_name'] }}"  class="form-control">
               </div>
               <div class="form-group">
                 <label for="inputDescription">Project Description</label>
                 <textarea id="project_desc" name="project_desc" class="form-control" rows="4">{{$project['project_desc'] }}</textarea>
               </div>
              <div class="form-group">
                <label>Project Team</label>
                <select multiple class="custom-select" name="project_team[]" id="project_team">
                  @foreach($data as $user)
                    @php  
                    if(in_array($user['id'], $team))
                    { @endphp
                      <option value="{{ $user['id'] }}" selected>{{ $user['name'] }}</option>
                    @php }  
                    else
                    { @endphp
                        <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>            
                     @php } @endphp    
                  @endforeach
                </select>
              </div>           
                <div class="form-group">
                  <label for="inputStatus">Client Status</label>
                  <select id="client_status" name="client_status" class="form-control custom-select">
                    <option selected>{{$project['client_status'] }}</option>
                     @if($project['client_status'] == "On Hold")                         
                       <option>Canceled</option>
                       <option>Success</option>
                     @endif                
                     @if($project['client_status'] == "Canceled")
                       <option>On Hold</option>
                       <option>Success</option>
                     @endif
                     @if($project['client_status'] == "Success")
                       <option>On Hold</option>
                       <option>Canceled</option>
                     @endif
                  </select>
                </div>
             <div class="form-group">
               <label for="inputClientCompany">Client Company</label>
               <input type="text" id="client_company" value="{{$project['client_company'] }}" name="client_company" class="form-control">
             </div>
             <div class="form-group">
               <label for="inputProjectLeader">Project Leader</label>
               <input type="text" id="project_leader" value="{{$project['project_leader'] }}" name="project_leader" class="form-control">
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
               <button type="button" class="btn btn-tool"  data-card-widget="collapse" title="Collapse">
                 <i class="fas fa-minus"></i>
               </button>
             </div>
           </div>
           <div class="card-body">
             <div class="form-group">
               <label for="inputEstimatedBudget">Estimated budget</label>
               <input type="number" id="estimated_budget" value="{{$project->project_budgets['estimated_budget']}}" name="estimated_budget" class="form-control">
             </div>
             <div class="form-group">
               <label for="inputSpentBudget">Total amount spent</label>
               <input type="number" id="amount_spent" name="amount_spent" value="{{$project->project_budgets['amount_spent']}}" class="form-control">
             </div>
             <div class="form-group">
               <label for="inputEstimatedDuration">Estimated project duration</label>
               <input type="number" id="estimated_duration" value="{{$project->project_budgets['estimated_duration']}}" name="estimated_duration" class="form-control">
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
         <input type="submit" name="submit" value="Update Porject" class="btn btn-success float-right">
       </div>
     </div>
   </section>
  </form>
   <!-- /.content -->

 <!-- /.content-wrapper -->
@endsection