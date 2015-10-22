@extends('layout')
@section('content')
<section class='content widthController'>

         <div class="row">
                        <div class="col-md-12">
							<div class="box box-primary">
                                <div class="box-header">
									
                                    <h3 class="box-title">All Users</h3>
									<div class="col-md-4 col-md-offset-3  position">
										<form action="" class="search-form">
											<div class="form-group has-feedback">
												<label for="search" class="sr-only">Search</label>
												<input type="text" class="form-control" name="search" id="search" placeholder="search">
												<span class="glyphicon glyphicon-search form-control-feedback"></span>
											</div>
										</form>
									</div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
								
                                    <table class="table table-bordered">
										<thead>
											<tr>
												<th>Emp ID</th>
												<th>Full Name</th>
												<th>Email</th>
												<th>Role</th>
												<th>Organization</th>
												<th>Update New Module Permission</th>
												<th>Update</th>
												<th>Delete</th>
											</tr>
										</thead>
										
										<tbody>
										@foreach($users as $user)
											<tr>
												<td class='text-centre'>{{$user->emp_id}}</td>
												<td class='text-centre'>{{$user->name}}</td>
												<td class='text-centre'>{{$user->email}}</td>
												<td class='text-centre'>{{$user->role}}</td>
												<td class='text-centre'>{{$user->organization}}</td>
												
												<td class='text-centre'>
													<a data-toggle="modal" data-target="#updatePermission{{$user->id}}" href='' style='color:green;float:right;padding:5px;'>
                                      			    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                  				   </a>
												</td>
												<td class='text-centre'>
													<a data-toggle="modal" data-target="#updateUser{{$user->id}}" href='' style='color:green;float:right;padding:5px;'>
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </a>
												</td>
												<td class='text-centre'>
													<a data-toggle="modal" data-target="#delete{{$user->id}}" href="#" style='color:red;float:right;padding:5px;'><span class="glyphicon glyphicon-trash"></span>
													</a>
												</td>
											</tr>
										@endforeach
										</tbody>
										
									</table>
									
                                </div><!-- /.box-body -->
                            </div>    
                            </div>    
      </div>    
	<!-- update User-->

@foreach($users as $user)
<div class="modal fade" id="updateUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update User</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'newUser/update', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					@if (Auth::check())						
							   {{Form::hidden('id',$user->id)}}							
							   {{Form::hidden('old_organization',$user->organization)}}							
					@endif
					<div class="form-group required">
                                        
											{{Form::label('name', 'Full Name', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('name',$user->name, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('emp_id', 'Employee ID', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('emp_id',$user->emp_id, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('email', 'Email', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::text('email',$user->email, array('class' => 'form-control','placeholder'=>'','required'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('designation', 'Designation', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											
											{{Form::select('designation', $roles, $user->role, array('class' => 'form-control'));}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('organization', 'Organization', array('class' => 'col-xs-4 control-label'))}}
											
											
											<div class="col-xs-6">											
											<select id="organizations{{$user->id}}" name='organization' class="demo-default" placeholder="Select  Organization...">
												<option  selected='selected'value="{{$user->organization}}">{{$user->organization}}</option>
												@foreach($organizations as $organization)
												<option value="{{$organization}}">{{$organization}}</option>
												@endforeach
											</select>										
											</div>
											
                    </div>
                    <div style="display:none">
                   
                    </div>

                    @if($modules)
                     @foreach ($modules as $module) 
                     @if($module->user_id==$user->emp_id)
                    <div class='form-group'>
                    {{Form::label('module', $module->module_name, array('class' => 'col-xs-4 control-label'))}}
                    <div class="col-xs-8">                    
                   
                    @if($module->access=='true')       
                    {{Form::hidden($module->module_name.'_'.'access','false')}}             
                    {{Form::checkbox($module->module_name.'_'.'access', 'true',true)}}Access</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'access','false')}}
                    {{Form::checkbox($module->module_name.'_'.'access', 'true',false)}}Access</br>
					@endif
                    					
					@if( $module->entry=='true')
					{{Form::hidden($module->module_name.'_'.'entry','false')}}
                    {{Form::checkbox($module->module_name.'_'.'entry', 'true',true)}}Entry</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'entry','false')}}
                    {{Form::checkbox($module->module_name.'_'.'entry', 'true',false)}}Entry</br>
					@endif

					@if( $module->update=='true')
					{{Form::hidden($module->module_name.'_'.'update','false')}}
                    {{Form::checkbox($module->module_name.'_'.'update', 'true',true)}}Update</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'update','false')}}
                    {{Form::checkbox($module->module_name.'_'.'update', 'true',false)}}Update</br>
					@endif
					
					@if( $module->approve=='true')
					{{Form::hidden($module->module_name.'_'.'approve','false')}}
                    {{Form::checkbox($module->module_name.'_'.'approve', 'true',true)}}Approve</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'approve','false')}}
                    {{Form::checkbox($module->module_name.'_'.'approve', 'true',false)}}Approve</br>
					@endif

					@if( $module->worning=='true')
					{{Form::hidden($module->module_name.'_'.'worning','false')}}
                    {{Form::checkbox($module->module_name.'_'.'worning', 'true',true)}}Worning</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'worning','false')}}
                    {{Form::checkbox($module->module_name.'_'.'worning', 'true',false)}}Worning</br>
					@endif

					@if( $module->sof_delete=='true')
					{{Form::hidden($module->module_name.'_'.'sof_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'sof_delete', 'true',true)}}S.Delete</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'sof_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'sof_delete', 'true',false)}}S.Delete</br>
					@endif
					@if( $module->par_delete=='true')
					{{Form::hidden($module->module_name.'_'.'par_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'par_delete', 'true',true)}}P.Delete</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'par_delete','false')}}
                    {{Form::checkbox($module->module_name.'_'.'par_delete', 'true',false)}}P.Delete</br>
					@endif
					@if( $module->report=='true')
					{{Form::hidden($module->module_name.'_'.'report','false')}}
                    {{Form::checkbox($module->module_name.'_'.'report', 'true',true)}}Report</br>
                    @else
                    {{Form::hidden($module->module_name.'_'.'report','false')}}
                    {{Form::checkbox($module->module_name.'_'.'report', 'true',false)}}Report</br>
					@endif

                    </div>
                    </div>
                    @endif
                    @endforeach
                  

                   @endif

					<div class="form-group required">
                                        
											{{Form::label('password', 'New Password', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::password('password',array('class' => 'form-control','placeholder'=>''))}}
											</div>
											
                    </div>
					<div class="form-group required">
                                        
											{{Form::label('password_confirmation', 'Conform Password', array('class' => 'col-xs-4 control-label'))}}
											<div class="col-xs-6">
											{{Form::password('password_confirmation', array('class' => 'form-control','placeholder'=> '' ))}}
											</div>
											
                    </div>	
                    

                    <div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	<script>
$(document).ready(function(){
//$('#organization').selectize();
$('#organizations{{$user->id}}').selectize({ create: true, sortField: {field: 'text',direction: 'asc'}});
	
});

</script>
<div class="modal fade" id="delete{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'user/delete', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					@if (Auth::check())						
							   {{Form::hidden('id',$user->id)}}							
					@endif
					<div class="pull-centre">
                                          <h3> Really Want To Delete ?</h3>										
                    </div>                   

                    <div class="form-group">
                       
                            <button type="submit" class="btn btn-danger btn-lg btn-block">Yes!! Delete</button>
                       
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	<div style="display:none">{{$no=0}}</div> 
<div class="modal fade" id="updatePermission{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Update New Module Permission</h4>
            </div>

            <div class="modal-body">
                <!-- The form is placed inside the body of modal -->
               
				{{Form::open(array('url' => 'newModulePermissionupdate', 'method' => 'post',  'class'=>'form-horizontal','data-toggle'=>'validator', 'role'=>'form'))}}
					
					@if (Auth::check())						
							   {{Form::hidden('id',$user->emp_id)}}							
							  
					@endif
					
					<div class="form-group required">
                                        
											{{Form::label('modules', 'Module', array('class' => 'col-xs-4 control-label'))}}
											
											<div class="col-xs-6">											
											<select id="module_name{{$user->id}}" name='module_name' class="demo-default" placeholder="Select  Module...">
												
												@foreach($moduleNames as $module)
												<option value="{{$module}}">{{++$no.' '.$module}}</option>
												@endforeach
											</select>										
											</div>
											
                    </div>					
					<div class='form-group'>
                    {{Form::label('module','Permission', array('class' => 'col-xs-4 control-label'))}}
                    <div class="col-xs-8">                    
                    {{Form::hidden('access', 'false')}}
                    {{Form::checkbox('access', 'true', false)}}Access</br>
                    {{Form::hidden('entry', 'false')}}
                    {{Form::checkbox('entry', 'true', false)}}Entry</br>
                    {{Form::hidden('update', 'false')}}
                    {{Form::checkbox('update', 'true', false)}}Edit</br>
                    {{Form::hidden('approve', 'false')}}
                    {{Form::checkbox('approve', 'true', false)}}Approve</br>
                    {{Form::hidden('worning', 'false')}}
                    {{Form::checkbox('worning', 'true', false)}}Worning</br>
                    {{Form::hidden('sof_delete', 'false')}}
                    {{Form::checkbox('sof_delete', 'true', false)}}S.D</br>
                    {{Form::hidden('par_delete', 'false')}}
                    {{Form::checkbox('par_delete', 'true', false)}}P.D</br>
                    </div>
                    </div>
                    <div class="form-group">
                       
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Save</button>
                       
                    </div>
					{{Form::close()}}
            </div>
        </div>
    </div>
	</div>
	<script>
$(document).ready(function(){
$('module_name{{$user->id}}').selectize();
});
</script>
@endforeach
   <!-- End update User-->  
                     
</section>

@stop